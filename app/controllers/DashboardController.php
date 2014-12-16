<?php

class DashboardController extends BaseController{

	public function showDashboard(){
		$categories = Category::all();
		$rconnector = Rconnector::find('1');
		return View::make('dashboard.main')
			->with('rconnector', $rconnector)
			->with('categories', $categories);
	}

}