<?php

class UserController extends BaseController{

	public function getLogin()
	{
		return View::make('user.login');
	}

	public function postLogin()
	{
		$validate = Validator::make(Input::all(), array(
			'email' => 'required',
			'password' => 'required'
		));

		if($validate->fails())
		{
			return Redirect::route('getLogin')
			->withErrors($validate)
			->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			), $remember);

			if($auth)
			{
				return Redirect::intended('/')->with('success','Connected');
			}
			else
			{
				return Redirect::route('getLogin')->with('fail', 'Invalid email and password');
			}
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('home')->with('info','Disconnected');
	}
}