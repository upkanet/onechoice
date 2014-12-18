<?php

class DashboardController extends BaseController{

	public function showDashboard(){
		$categories = Category::all();

		return View::make('dashboard.main')
			->with('categories', $categories);
	}

}