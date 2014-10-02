<?php

class ProfileController extends BaseController {

    /**
     * Show the activities from a users.
     */
    public function profile($username)
    {
        $manager = App::make('feed_manager');
        $user = User::where('username', '=', $username)->firstOrFail();
        $feed = $manager->getUserFeed($user->id);
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $manager->enrichActivities($activities);
        $follow = Follow::firstOrNew(array(
                'user_id' => Auth::id(),
                'target_id' => $user->id,
            )
        );
        return View::make('profile', array('profile' => $user, 'activities' => $activities, 'follow' => $follow));
    }

}

?>
