<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$products = Product::where('isActive','=',1)->take(12)->get();

		foreach ($products as $product) {
			if($product->img_path == ''){
				$product->img_path = '/img/products/default.png';
			}
		}

		return View::make('index')
				->with('products',$products);
	}

}
