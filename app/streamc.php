<?php

class FeedManager {

    public static $feeds = array('flat', 'aggregated');

    public function __construct()
    {
        $api_key = Config::get('stream.api_key');
        $api_secret = Config::get('stream.api_secret');
        if ($api_secret == null || $api_key == null) {
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

    public function followUser($user_id, $target_id)
    {
        foreach ($this->getFeeds($user_id) as $feed) {
            $feed->followFeed("user:$user_id");
        }
    }

    public function unfollowUser($user_id, $target_id)
    {
        foreach ($this->getFeeds($user_id) as $feed) {
            $feed->unfollowFeed("user:$user_id");
        }
    }

    public function addPin($pin)
    {
        $feed = $this->getUserFeed($pin->user_id);
        $activity = $pin->toActivity();
        $feed->addActivity($activity);
    }

    public function removePin($pin)
    {
        $feed = $this->client->feed('');
    }

    public function getUsers($user_ids)
    {
        $results = array();
        $users = User::whereIn('id', $user_ids)->get();
        foreach ($users as $user) {
            $results[$user->id] = $user;
        }
        return $results;
    }

    public function getPins($pin_ids)
    {
        $results = array();
        $pins = Pin::with('item', 'item.user')->whereIn('id', $pin_ids)->get();
        foreach ($pins as $pin) {
            $results[$pin->id] = $pin;
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
        $objects['user'] = $this->getUsers(array_keys($references['user']));
        $objects['pin'] = $this->getPins(array_keys($references['pin']));
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
            $references = array_merge_recursive($references, $this->collectReferences($aggregated['activities']));
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
    return new FeedManager;
});
