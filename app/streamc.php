<?php

class FeedManager {

    public static $feeds = array('flat', 'aggregated');
    public static $registeredActivityModels = array(
        'user' => 'User',
        'follow' => 'Follow', 
        'pin' => 'Pin'
    );
    public static $activityLoaders = array(
        'User' => array(),
        'Follow' => array('user.followers'),
        'Pin' => array('item.pinsFromMe', 'item', 'item.user')
    );

    public function __construct()
    {
        $api_key = Config::get('stream.api_key');
        $api_secret = Config::get('stream.api_secret');
        if (getenv('STREAM_URL') !== false) {
            $this->client = GetStream\Stream\Client::herokuConnect(getenv('STREAM_URL'));
        } else {
            $this->client = new GetStream\Stream\Client($api_key, $api_secret);
        }
    }

    public function getFeeds($user_id)
    {
        $feeds = array();
        foreach (self::$feeds as $feed) {
            $feeds[$feed] = $this->client->feed("$feed:$user_id");
        }
        return $feeds;
    }

    public function getUserFeed($user_id){
        return $this->client->feed("user:$user_id");
    }

    public function followUser($follow)
    {
        foreach ($this->getFeeds($follow->user_id) as $feed) {
            $feed->followFeed("user:$follow->target_id");
        }
    }

    public function unfollowUser($follow)
    {
        foreach ($this->getFeeds($follow->user_id) as $feed) {
            $feed->unfollowFeed("user:$follow->target_id");
        }
    }

    public function addFollow($follow)
    {
        $feed = $this->getUserFeed($follow->user_id);
        $activity = $follow->toActivity();
        $feed->addActivity($activity);
    }

    public function removeFollow($follow)
    {
        $feed = $this->getUserFeed($follow->user_id);
        $activity = $follow->toActivity();
        $feed->removeActivity($activity['foreign_id'], true);
    }

    public function addPin($pin)
    {
        $feed = $this->getUserFeed($pin->user_id);
        $activity = $pin->toActivity();
        $feed->addActivity($activity);
    }

    public function removePin($pin)
    {
        $feed = $this->getUserFeed($pin->user_id);
        $activity = $pin->toActivity();
        $feed->removeActivity($activity['foreign_id'], true);
    }

    public function fromDb($model, $ids, $with=array())
    {
        $results = array();
        $objects = $model::with($with)->whereIn('id', $ids)->get();
        foreach ($objects as $object) {
            $results[$object->id] = $object;
        }
        return $results;
    }

    private function collectReferences($activities)
    {
        $ids = array();
        foreach ($activities as $key => $activity) {
            $ids['user'][$activity['actor']] = 1;
            $content_data = explode(":", $activity['object']);
            $content_type = $content_data[0];
            $content_id = $content_data[1];
            $ids[$content_type][$content_id] = 1;
        }
        return $ids;
    }

    private function retrieveObjects($references)
    {
        $objects = array();
        foreach ($references as $content_type => $content_ids) {
            $content_type_model = self::$registeredActivityModels[$content_type];
            $with = self::$activityLoaders[$content_type_model];
            $fetched = $this->fromDb($content_type_model, array_keys($content_ids), $with);
            if (count($fetched) < count(array_keys($content_ids))) {
                throw new Exception('Some data in this feed is not in the database');
            }
            $objects[$content_type] = $fetched;
        }
        return $objects;
    }

    private function injectObjects(&$activities, $objects)
    {
        foreach ($activities as $key => $activity) {
            $activities[$key]['actor'] = $objects['user'][$activity['actor']];
            $content_data = explode(":", $activity['object']);
            $content_type = $content_data[0];
            $content_id = $content_data[1];
            $activities[$key]['content_type'] = $content_type;
            $activities[$key]['object'] = $objects[$content_type][$content_id];
        }
        return $activities;
    }

    public function enrichActivities($activities)
    {
        if (count($activities) === 0) {
            return $activities;
        }

        $references = $this->collectReferences($activities);
        $objects = $this->retrieveObjects($references);
        $activities = $this->injectObjects($activities, $objects);
        return $activities;
    }

    public function enrichAggregatedActivities($aggregatedActivities)
    {
        if (count($aggregatedActivities) === 0) {
            return $aggregatedActivities;
        }

        $references = array();
        foreach ($aggregatedActivities as $aggregated) {
            $references = array_replace_recursive($references, $this->collectReferences($aggregated['activities']));
        }

        $objects = $this->retrieveObjects($references);
        foreach ($aggregatedActivities as $key => $aggregated) {
            $aggregatedActivities[$key]['updated_at'] = new \Carbon\Carbon($aggregatedActivities[$key]['updated_at']);
            $this->injectObjects($aggregatedActivities[$key]['activities'], $objects);
        }
        return $aggregatedActivities;
    }

}

App::singleton('feed_manager', function()
{
    $manager = new FeedManager;
    return $manager;
});
