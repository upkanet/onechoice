<?php

class CategoryController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('dashboard.create_category');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = Validator::make(Input::all(), [
				'name' => 'required',
				'permalink' => 'required|alpha_dash|unique:categories',
				'img' => 'image|max:200'
			]);

		if($validate->fails()){
			return Redirect::route('dashboard')
				->withErrors($validate)
				->withInput();
		}
		else{	
			$category = new Category();
			$category->name = Input::get('name');
			$category->permalink = Input::get('permalink');

			//Img
			if(Input::hasFile('img'))
			{
				$img_info = getimagesize(Input::file('img'));
				if($img_info[0] == 1920 && $img_info[1] == 273){
					$category->img_path = $this->storeImg(Input::file('img'));
				}
				else{
					return Redirect::route('dashboard')->with('fail', 'Error the Category Image must be 1920x273.');
				}
			}

			if($category->save()){
				return Redirect::route('dashboard')->with('success', 'Category added successfully');
			}
			else{
				return Redirect::route('dashboard')->with('fail', 'Error while adding category');
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Category::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);
		if($category->img_path == ''){
			$category->img_path = 'http://placehold.it/1920x273';
		}
		return View::make('dashboard.edit_category')->with('category',$category);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validate = Validator::make(Input::all(), [
				'name' => 'required',
				'permalink' => 'required|alpha_dash',
				'img' => 'image|max:200'
			]);

		if($validate->fails()){
			return Redirect::route('dashboard')
				->withErrors($validate)
				->withInput();
		}
		else{	
			$category = Category::find($id);
			$category->name = Input::get('name');
			$category->permalink = Input::get('permalink');

			//Img
			if(Input::hasFile('img'))
			{
				$img_info = getimagesize(Input::file('img'));
				if($img_info[0] == 1920 && $img_info[1] == 273){
					$category->img_path = $this->storeImg(Input::file('img'));
				}
				else{
					return Redirect::route('dashboard')->with('fail', 'Error the Category Image must be 1920x273.');
				}
			}

			if($category->save()){
				return Redirect::route('dashboard')->with('success', 'Category updated successfully');
			}
			else{
				return Redirect::route('dashboard')->with('fail', 'Error while updating category');
			}
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$result = ['success' => 0];
		if(Category::destroy($id)){
			$result['success'] = 1;
		}
		return json_encode($result);
	}


	public function getConnectorsList($id){
		$connectors = Category::find($id)->rconnectors;
		return View::make('dashboard.connectors_list')->with('connectors',$connectors);
	}

	public function storeImg($imgFile){
		$destinationPath = '/img/categories/';
		$fileName = date('YmdHis');
		$extension = $imgFile->getClientOriginalExtension();
		$imgFile->move(public_path().$destinationPath, $fileName.'.'.$extension);

		return $destinationPath.$fileName.'.'.$extension;
	}


}
