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

//Product
Route::get('{category}/{permalink}', ['uses' => 'ProductController@show']);

//Dashboard
Route::get('dashboard', array('as' => 'dashboard', 'before' => 'auth', 'uses' => 'DashboardController@showDashboard'));
Route::get('dashboard/connectors/{id}', array('as' => 'getConnectors', 'uses' => 'CategoryController@getConnectorsList'))->where('id', '[0-9]+');
Route::get('dashboard/products/{ids}', array('as' => 'getProducts', 'uses' => 'RconnectorController@getAllProducts'));
Route::get('dashboard/connectors/create', array('as' => 'createConnector', 'uses' => 'RconnectorController@create'));
Route::post('dashboard/connectors/store', array('as' => 'storeConnector', 'uses' => 'RconnectorController@store'));
Route::get('dashboard/connectors/{id}/edit', array('as' => 'editConnector', 'uses' => 'RconnectorController@edit'))->where('id', '[0-9]+');
Route::put('dashboard/connectors/{id}', array('as' => 'updateConnector', 'uses' => 'RconnectorController@update'))->where('id', '[0-9]+');