<?php

class PinController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$params = array(
			'user_id' => Auth::id(),
			'item_id' => Input::get('item'),
			'influencer_id' => Input::get('influencer'),
		);
		$pin = Pin::withTrashed()->where($params)->first();
		if ($pin === null) {
			$pin = new Pin($params);
			$pin->save();
		}
		elseif ($pin->trashed()) {
			$pin->restore();
		}
		$next = Input::get('next');
		return Redirect::to($next);
	}

	public function destroy($resource)
	{
		$pin = Pin::firstOrNew(array(
				'id' => $resource,
				'user_id' => Auth::id()
			)
		);
		if ($pin->id !== null) {
			$manager = App::make('feed_manager');
			$pin->delete();
		}
		return Redirect::to(Input::get('next'));
	}

}
