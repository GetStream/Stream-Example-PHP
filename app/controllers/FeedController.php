<?php

class FeedController extends BaseController {

    /**
     * Show the activities from followed users.
     */
    public function feed()
    {
        $manager = App::make('feed_manager');
        $feed = $manager->getFeeds(Auth::id())['flat'];
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $manager->enrichActivities($activities);
        return View::make('feed', array('activities'=> $activities));
    }

    /**
     * Show the aggregated activities from followed users.
     */
    public function aggregated_feed()
    {
        $manager = App::make('feed_manager');
        $feed = $manager->getFeeds(Auth::id())['aggregated'];
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $manager->enrichAggregatedActivities($activities);
        return View::make('aggregated_feed', array('activities'=> $activities));
    }

}

?>