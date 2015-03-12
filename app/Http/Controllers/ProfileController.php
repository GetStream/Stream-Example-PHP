<?php

use GetStream\StreamLaravel\Enrich;

class ProfileController extends BaseController {

    /**
     * Show the activities from a users.
     */
    public function profile($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();
        $feed = FeedManager::getUserFeed($user->id);
        $enricher = new Enrich;
        $activities = $feed->getActivities(0,25)['results'];
        $activities = $enricher->enrichActivities($activities);
        $follow = Follow::firstOrNew(array(
                'user_id' => Auth::id(),
                'target_id' => $user->id,
            )
        );
        return View::make('profile', array('profile' => $user, 'activities' => $activities, 'follow' => $follow));
    }

    public function index()
    {
        $with = array('followers' => function($query) {
                $query->where('user_id', '=', Auth::id());
            }
        );
        $people = User::with($with)->get()->take(25);
        return View::make('people', array('people' => $people));
    }
}

?>
