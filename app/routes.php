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

//Search
Route::get('search/{room}',['uses' => 'ProductController@search']);

//Category
Route::resource('categories','CategoryController');

//Rooms
Route::resource('rooms','RoomController',['except' => ['show']]);
Route::get('room/{room}',['as' => 'showRoom','uses' => 'RoomController@show']);

//Product
Route::get('{category}/{permalink}', ['uses' => 'ProductController@show']);

//Dashboard
Route::get('dashboard', array('as' => 'dashboard', 'before' => 'auth', 'uses' => 'DashboardController@showDashboard'));

Route::get('dashboard/connectors/{id}', array('as' => 'getConnectors', 'uses' => 'CategoryController@getConnectorsList'))->where('id', '[0-9]+');
Route::get('dashboard/connectors/create', array('as' => 'createConnector', 'uses' => 'RconnectorController@create'));
Route::post('dashboard/connectors/store', array('as' => 'storeConnector', 'uses' => 'RconnectorController@store'));
Route::get('dashboard/connectors/{id}/edit', array('as' => 'editConnector', 'uses' => 'RconnectorController@edit'))->where('id', '[0-9]+');
Route::put('dashboard/connectors/{id}', array('as' => 'updateConnector', 'uses' => 'RconnectorController@update'))->where('id', '[0-9]+');
Route::delete('dashboard/connectors/{id}', ['as' => 'destroyConnector', 'uses' => 'RconnectorController@destroy'])->where('id', '[0-9]+');

Route::get('dashboard/products/{ids}', array('as' => 'getProducts', 'uses' => 'RconnectorController@getAllProducts'));
Route::post('dashboard/products/store', ['as' => 'storeProduct', 'uses' => 'ProductController@store']);
Route::get('dashboard/products_by_cat/{category_id}', ['as' => 'indexProduct', 'uses' => 'ProductController@index']);
Route::get('dashboard/activate/{product_id}', ['as' => 'activateProductForm', 'uses' => 'ProductController@activateForm']);
Route::post('dashboard/activate/{product_id}', ['as' => 'activateProduct', 'uses' => 'ProductController@activate']);


