<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use \User;
use \Follow;
use \FeedManager;
use \Redirect;
use \Input;

class FollowAdminCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'followAdmin';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Let admin follow himself.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$admin = User::where('username', '=', 'admin')->firstOrFail();
		$follow = Follow::firstOrNew(array(
				'user_id' => $admin->id,
				'target_id' => $admin->id,
			)
		);
		if ($follow->id === null) {
			$follow->save();
			FeedManager::followUser($follow->user_id, $follow->target_id);
		}
		return Redirect::to(Input::get('next'));
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
