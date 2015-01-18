<?php

class RoomController extends \BaseController {

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
		$all_categories = Category::all();
		return View::make('dashboard.create_room')->with('all_categories',$all_categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = Validator::make(Input::all(),[
			'name' => 'required',
			'permalink' => 'required|alpha_dash|unique:rooms'
			]);

		if($validate->fails()){
			return Redirect::route('dashboard')
				->withErrors($validate)
				->withInput();
		}
		else{
			$room = new Room();
			$room->name = Input::get('name');
			$room->permalink = Input::get('permalink');


			if($room->save()){
				foreach (Input::get('room_categories') as $category_id) {
					$room->categories()->attach($category_id);
				}
				return Redirect::route('dashboard')->with('success', 'Room added successfully');
			}
			else{
				return Redirect::route('dashboard')->with('fail', 'Error while adding room');
			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($permalink)
	{
		$room = Room::where('permalink','=',$permalink)->firstOrFail();
		$categories = $room->categories;
		return View::make('room')
				->with('room', $room)
				->with('categories', $categories);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$room = Room::find($id);
		$all_categories = Category::all();
		
		$room_categories = array();
		foreach ($room->categories as $category) {
			$room_categories[] = $category->id;
		}

		return View::make('dashboard.edit_room')
			->with('room',$room)
			->with('room_categories',$room_categories)
			->with('all_categories',$all_categories);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$room = Room::find($id);
		$room->name = Input::get('name');
		$room->permalink = Input::get('permalink');

		$room->categories()->detach();
		foreach (Input::get('room_categories') as $category_id) {
			$room->categories()->attach($category_id);
		}

		if($room->save()){
			return Redirect::route('dashboard')->with('success', 'Room modified successfully');
		}
		else{
			return Redirect::route('dashboard')->with('fail', 'Error while editing room');
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
		if(Room::destroy($id)){
			$result['success'] = 1;
		}

		return $result;
	}


}
