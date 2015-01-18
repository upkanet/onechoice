<?php

class ProductController extends BaseController{

	public function index($category_id){
		$products = Product::where('category_id','=',$category_id)->take(10)->orderBy('created_at','desc')->get();

		return View::make('dashboard.products')
				->with('products',$products);
	}

	public function show($category,$permalink){

		$product = Product::where('permalink','=',$permalink)->firstOrFail();

		if($product->img_path == ''){
			$product->img_path = '/img/products/default.png';
		}

		if($product->category->img_path == ''){
			$product->category->img_path = '/img/categories/default.jpg';
		}

		return View::make('product')
			->with('product', $product);

	}

	public function store(){
		$validate = Validator::make(Input::all(),[
			'name' => 'required',
			'permalink' => 'required|alpha_dash|unique:products'
			]);

		if($validate->fails()){
			return Redirect::route('dashboard')
				->withErrors($validate)
				->withInput();
		}
		else{
			$product = new Product();

			$product->category_id = Input::get('category_id');
			$product->name = Input::get('name');
			$product->permalink = Input::get('permalink');
			
			$product->img_path = $this->storeProductImg(Input::get('imgdata'));

			//Merchant
			$merchantlink = new Merchantlink();
			$merchantlink->merchant = Input::get('merchant_name');
			$merchantlink->link = Input::get('merchant_link');

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
				$product->merchantlink()->save($merchantlink);
				return Redirect::route('dashboard')->with('success','Product added');
			}
			else{
				return Redirect::route('dashboard')->with('error','An error occured while adding product');
			}
			
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
		$affectedRows = Product::active()->where('category_id','=',$category_id)->update(['isActive' => 0]);
	}

	public function search($room){
		$q = Input::get('q');
		$products = DB::table('products')
						->leftJoin('categories','products.category_id','=','categories.id')
						->leftJoin('category_room','categories.id','=','category_room.category_id');
		if($room > 0 ) {
			$products = $products->leftJoin('rooms','category_room.room_id','=','rooms.id')
								->where('rooms.id','=',$room);
		}
		$products = $products->where('isActive','=',1)
							->where(function($query) use ($q){
								$query->where('products.name','LIKE','%'.$q.'%')
								->orWhere('categories.name','LIKE','%'.$q.'%');
							})
							->select('products.name as pName','products.permalink as pLink','products.img_path as pImg','categories.name as cName','categories.permalink as cLink')
							->groupby('products.id')->get();

		return $products;
	}

}
