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

use App\Role;

use App\User;

use App\Permission;

Route::group(['middleware' => 'web'], function (){
	Route::get('/', function () {
		return view('home');
	});

	Route::auth();
	
	Route::get('/home', 'HomeController@index');

	Route::get('profile/{profile}', 'ProfilesController@show');
	// Route::post('profile', 'ProfilesController@update');

	Route::post('project/search', 'ProjectsController@search');

	Route::resource('project', 'ProjectsController');

	Route::group(['prefix' => 'project/{project}'], function () {
	    Route::resource('announcement', 'AnnouncementsController');
	    Route::resource('comment', 'CommentsController');
	    Route::post('searchmembers', 'MembersController@search');
		Route::post('member', 'MembersController@store');
		Route::delete('member/{member}', 'MembersController@destroy');
	});

	// Route::get('/rolesandpermissions', function()
	// {
	// 	$userRole = Role::where('name', '=', 'user')->first();
	// 	$adminRole = Role::where('name', '=', 'admin')->first();

	// 	$user = User::where('username', '=', 'admin123')->first();
	// 	$user->attachRole($adminRole);

	// 	$createPost = Permission::where('name', '=', 'create-post')->first();
	// 	$viewPost = Permission::where('name', '=', 'view-post')->first();
	// 	// $createPost->name         = 'create-post';
	// 	// $createPost->display_name = 'Create Posts'; // optional
	// 	// $createPost->description  = 'create new blog posts'; // optional
	// 	// $createPost->save();

	// 	// $viewPost = new Permission();
	// 	// $viewPost->name = 'view-post';
	// 	// $viewPost->display_name = 'View Posts';
	// 	// $viewPost->description = 'view posts lol';
	// 	// $viewPost->save();

	// 	$adminRole->attachPermissions(array($createPost, $viewPost));
	// 	$userRole->attachPermission($viewPost);
	// });

	Route::get('/testpermissions', function()
	{
		if  (Entrust::hasRole('admin'))
		{
			echo "Yes";
		}else
		{
			echo "No";
		}

		dd('test');
	});
});