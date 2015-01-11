<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function __construct()
	{
		$rooms = Room::all();
		$current_room_id = 0;

		foreach ($rooms as $room) {
			if(Request::is('room/'.$room->permalink)){$current_room_id = $room->id;}
		}

		View::share('rooms',$rooms);
		View::share('current_room_id',$current_room_id);
	}

}
