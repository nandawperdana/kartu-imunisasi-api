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
Route::resource('reminders','RemindersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' =>'Auth\PasswordController',
]);

Route::group(['prefix' => 'api/v1'], function()
{
	Route::post('authenticate','APIController@authenticate');
	Route::post('signup','APIController@signup');
	Route::resource('users','UsersAPIController');
	Route::post('users/{id}/upload','UsersAPIController@upload');
	Route::resource('children','ChildrenAPIController');
	Route::resource('attributes','AttributesAPIController');
	Route::resource('reminders','RemindersAPIController');
	Route::get('attributes/shows/{type}','AttributesAPIController@shows');
	Route::resource('histories','VaccineHistoriesAPIController');
	Route::resource('users.children','ChildrenAPIController', ['only' => ['index', 'show']]);
	Route::resource('children.histories','VaccineHistoriesAPIController', ['only' => ['index', 'show']]);
});