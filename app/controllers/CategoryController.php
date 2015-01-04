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
		$result = ['success' => 0];

		$category = new Category();
		$category->name = Input::get('name');
		$category->permalink = Input::get('permalink');

		if($category->save()){
			$result['success'] = 1;
		}

		return json_encode($result);
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
		$result = ['success' => 0];
		$category = Category::find($id);
		
		$category->name = Input::get('name');
		$category->permalink = Input::get('permalink');

		if($category->save()){
			$result['success'] = 1;
		}

		return $result;

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


}
