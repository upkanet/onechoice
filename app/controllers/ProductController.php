<?php

class ProductController extends BaseController{


	public function show($category,$permalink){

		$product = Product::where('permalink','=',$permalink)->firstOrFail();

		return View::make('product')
			->with('category', $category)
			->with('product', $product);

	}

	public function store(){
		$product = new Product();

		$product->category_id = Input::get('category_id');
		$product->name = Input::get('name');
		$product->permalink = Input::get('permalink');
		
		$product->img_path = $this->storeProductImg(Input::get('imgdata'));

		$product->arg1 = Input::get('argument1');
		$product->arg2 = Input::get('argument2');
		$product->arg3 = Input::get('argument3');
		$product->arg4 = Input::get('argument4');
		$product->arg5 = Input::get('argument5');
		$product->arg6 = Input::get('argument6');
		$product->arg7 = Input::get('argument7');

		$product->save();
	}

	private function getImg($imgdata){
		list($type, $data) = explode(';', $imgdata);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

		return $data;
	}

	private function storeProductImg($imgdata){
		$path = '/img/products/'.date('YmdHis').'.png';
		$data = $this->getImg($imgdata);
		$put_content = File::put(public_path().$path,$data);

		return $path;
	}

}
