<?php

class FollowController extends BaseController {

	/**
	 * Let current user follow user $target_id
	 *
	 * @return Response
	 */
	public function store()
	{
		$target_id = Input::get('target');
		$user_id = Auth::id();
		$follow = Follow::firstOrNew(array(
				'user_id' => Auth::id(),
				'target_id' => $target_id,
			)
		);
		if ($follow->id === null) {
			$follow->save();
			$manager = App::make('feed_manager');
			$manager->followUser($user_id, $target_id);
		}
		return Redirect::to(Input::get('next'));
	}

	public function destroy($resource)
	{
		$follow = Follow::firstOrNew(array(
				'id' => $resource,
				'user_id' => Auth::id()
			)
		);
		if ($follow->id !== null) {
			$manager = App::make('feed_manager');
			$manager->unfollowUser($follow->user_id, $follow->target_id);
			$follow->delete();
		}
		return Redirect::to(Input::get('next'));
	}

}
