<?php

class ProductController extends BaseController{

	public function index($category_id){
		$products = Product::where('category_id','=',$category_id)->take(10)->orderBy('created_at','desc')->get();

		return View::make('dashboard.products')
				->with('products',$products);
	}

	public function show($category,$permalink){

		$product = Product::where('permalink','=',$permalink)->firstOrFail();

		if($product->category->img_path == ''){
			$product->category->img_path = '/img/categories/default.jpg';
		}

		return View::make('product')
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

		$product->art1 = Input::get('art1');
		$product->art1_url = Input::get('art1_url');
		$product->art2 = Input::get('art2');
		$product->art2_url = Input::get('art2_url');
		$product->art3 = Input::get('art3');
		$product->art3_url = Input::get('art3_url');

		if($product->save()){
			return Redirect::route('dashboard')->with('success','Product added');
		}
		else{
			return Redirect::route('dashboard')->with('error','An error occured while adding product');
		}
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

	public function activateForm($product_id){
		$product = Product::find($product_id);
		return View::make('dashboard.activate')
				->with('product', $product);
	}

	public function activate($product_id){
		$result = ['success' => 0];

		$product = Product::find($product_id);
		$product->isActive = 1;

		$this->desactivate($product->category_id);

		if($product->save()){
			$result['success'] = 1;
		}
		$result = json_encode($result);
		return $result;
	}

	private function desactivate($category_id){
		$affectedRows = Product::activated()->where('category_id','=',$category_id)->update(['isActive' => 0]);
	}

}
