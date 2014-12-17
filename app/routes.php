<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Home
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));

//User
Route::get('login', array('as' => 'getLogin', 'before' => 'guest', 'uses' => 'UserController@getLogin'));
Route::get('logout', array('as' => 'getLogout', 'before' => 'auth', 'uses' => 'UserController@getLogout'));
Route::post('login', array('before' => 'csrf', 'uses' => 'UserController@postLogin'));

//Category
Route::resource('categories','CategoryController');

//Dashboard
Route::get('dashboard', array('as' => 'getDashboard', 'before' => 'auth', 'uses' => 'DashboardController@showDashboard'));
Route::get('dashboard/connectors/{catetory_id}', array('as' => 'getConnectors', 'uses' => 'DashboardController@getConnectorsList'));
