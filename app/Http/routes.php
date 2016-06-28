<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function (){
	Route::get('/', function () {
		return view('home');
	});

	Route::auth();
	
	Route::get('/home', 'HomeController@index');

	Route::get('profile/{profile}', 'ProfilesController@show');

	Route::post('project/search', 'ProjectsController@search');

	Route::resource('project', 'ProjectsController');

	Route::group(['prefix' => 'project/{project}'], function () {
		Route::resource('announcement', 'AnnouncementsController');
		Route::resource('comment', 'CommentsController');
		Route::post('searchmembers', 'MembersController@search');
		Route::post('member', 'MembersController@store');
		Route::delete('member/{member}', 'MembersController@destroy');
	});
	
	Route::group(['prefix' => 'admin', 'middleware' => ['role:alphaadmin']], function() {
		Route::get('initialize', 'AdminController@initialize');
		Route::get('dashboard', 'AdminController@index');
		Route::post('dashboard', 'AdminController@addAdmin');
		Route::delete('dashboard', 'AdminController@revokeAdmin');
	});

});