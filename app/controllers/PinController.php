<?php

class PinController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pin = Pin::firstOrNew(array(
				'user_id' => Auth::id(),
				'item_id' => Input::get('item'),
				'influencer_id' => Input::get('influencer'),
			)
		);
		if ($pin->id === null) {
			$pin->save();
			App::make('feed_manager')->addPin($pin);
		}
		$next = Input::get('next');
		return Redirect::to($next);
	}

}
