<?php

class LandingController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function trending()
    {
        $pinned = array('pins' => function($query)
        {
            $query->where('user_id', '=', Auth::id());
        }, 'user');
        $items = Item::with($pinned)->get()->take(25);
        return View::make('trending', array('items'=> $items));
    }

}

?>