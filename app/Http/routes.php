<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('attributes','AttributesController');
Route::resource('users','UsersController');
Route::resource('children','ChildrenController');
Route::resource('vaccineHistory','VaccineHistoryController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' =>'Auth\PasswordController',
]);

Route::group(['prefix' => 'api/v1'], function()
{
	Route::post('authenticate','APIController@authenticate');
	Route::resource('users','UsersAPIController');
	Route::resource('children','ChildrenAPIController');
	Route::resource('users.children','ChildrenAPIController', ['only' => ['index', 'show']]);
});