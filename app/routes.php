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

Route::group(array('before' => 'auth'), function()
{

	Route::get('/', function() {
		return Redirect::to('stories');
	});

	Route::get('account/settings', 'AccountController@edit');

	Route::post('email', 'AccountController@updateEmail');
	Route::post('password', 'AccountController@updatePassword');

	Route::post('stories/search', 'StoriesController@search');
	Route::post('stories/vote', 'StoriesController@vote');

	Route::resource('stories', 'StoriesController');
	
	Route::resource('stories.comments', 'StoryCommentsController');

});

Route::group(array('before' => 'no-auth'), function()
{

	Route::get('account/create', 'AccountController@create');
	Route::post('account/create', 'AccountController@store');
	
	Route::get('login', 'AccountController@getLogin');
	Route::post('login', 'AccountController@postLogin');

	Route::get('password/reset', 'PasswordController@remind');

	Route::post('password/reset', 'PasswordController@request');

	Route::get('password/reset/{token}', array(
	  'uses' => 'PasswordController@reset',
	  'as' => 'password.reset'
	));

	Route::post('password/reset/{token}', array(
	  'uses' => 'PasswordController@update',
	  'as' => 'password.update'
	));

});

Route::get('logout', 'AccountController@logout');
