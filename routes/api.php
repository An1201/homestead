<?php

use Illuminate\Http\Request;
Use App\Category;
Use App\Item;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('categories', 'CategoryController@index');
Route::get('categories/{id}', 'CategoryController@show');
Route::group(['middleware' => 'auth:api'], function () {
	Route::post('categories', 'CategoryController@store');
	Route::put('categories/{id}', 'CategoryController@update');
	Route::delete('categories/{id}', 'CategoryController@delete');
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::get('items', 'ItemController@index');
Route::get('items/{id}', 'ItemController@show');
Route::group(['middleware' => 'auth:api'], function () {
	Route::post('items', 'ItemController@store');
	Route::put('items/{id}', 'ItemController@update');
	Route::delete('items/{id}', 'ItemController@delete');
});
