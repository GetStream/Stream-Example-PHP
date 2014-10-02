<?php

class LandingController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function trending()
    {
        $items = Item::all()->take(25);
        return View::make('trending', array('items'=> $items));
    }

}

?>