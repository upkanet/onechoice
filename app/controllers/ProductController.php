<?php

class ProductController extends BaseController{


	public function show($category,$permalink){

		$product = Product::where('permalink','=',$permalink)->firstOrFail();

		return View::make('product')
			->with('category', $category)
			->with('product', $product);

	}

}
