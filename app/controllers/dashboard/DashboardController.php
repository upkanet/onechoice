<?php

class DashboardController extends BaseController{

	public function showDashboard(){
		$rooms = Room::all();
		$categories = Category::all();

		return View::make('dashboard.main')
			->with('rooms', $rooms)
			->with('categories', $categories);
	}

}