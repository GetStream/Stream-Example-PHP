<?php

use GetStream\StreamLaravel\Enrich;

class FeedController extends BaseController {

    /**
     * Show the activities from followed users.
     */
    public function feed()
    {
        $feed = FeedManager::getNewsFeeds(Auth::id())['flat'];
        $enricher = new Enrich;
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $enricher->enrichActivities($activities);
        return View::make('flat_feed', array('activities'=> $activities));
    }

    /**
     * Show the aggregated activities from followed users.
     */
    public function aggregated_feed()
    {
        $feed = FeedManager::getNewsFeeds(Auth::id())['aggregated'];
        $enricher = new Enrich;
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $enricher->enrichAggregatedActivities($activities);
        return View::make('aggregated_feed', array('activities'=> $activities));
    }

}

?>