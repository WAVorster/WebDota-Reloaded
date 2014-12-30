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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get ('login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
Route::get ('profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
Route::get ('logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

Route::resource('user', 'UsersController');
Route::get ('register', array('as' => 'register', 'uses' => 'UsersController@create'));

