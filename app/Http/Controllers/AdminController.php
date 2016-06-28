<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Role;

use App\Permission;

class AdminController extends Controller
{
	public function initialize()
	{
		// $alphaadmin = Role::where('name', '=', 'alphaadmin')->first();
		// $admin = Role::where('name', '=', 'admin')->first();
		// $user = Role::where('name', '=', 'user')->first();

		// $manageAdmin = Permission::where('name', '=', 'manage-admin')->first();

		// $viewProject = Permission::where('name', '=', 'view-project')->first();
		// // $viewProject = new Permission();
		// // $viewProject->name         = 'view-project';
		// // $viewProject->display_name = 'view Projects';
		// // $viewProject->description  = 'view Projects';
		// // $viewProject->save();

		// $addProject = Permission::where('name', '=', 'add-project')->first();
		// // $addProject = new Permission();
		// // $addProject->name         = 'add-project';
		// // $addProject->display_name = 'add Projects';
		// // $addProject->description  = 'add Projects';
		// // $addProject->save();

		// $editProject = Permission::where('name', '=', 'edit-project')->first();
		// // $editProject = new Permission();
		// // $editProject->name         = 'edit-project';
		// // $editProject->display_name = 'edit Projects';
		// // $editProject->description  = 'edit Projects';
		// // $editProject->save();

		// $deleteProject = Permission::where('name', '=', 'delete-project')->first();
		// // $deleteProject = new Permission();
		// // $deleteProject->name         = 'delete-project';
		// // $deleteProject->display_name = 'delete Projects';
		// // $deleteProject->description  = 'delete Projects';
		// // $deleteProject->save();

		// $addAnnouncement = Permission::where('name', '=', 'add-announcement')->first();
		// // $addAnnouncement = new Permission();
		// // $addAnnouncement->name         = 'add-announcement';
		// // $addAnnouncement->display_name = 'add Announcements';
		// // $addAnnouncement->description  = 'add Announcements';
		// // $addAnnouncement->save();

		// $editAnnouncement = Permission::where('name', '=', 'edit-announcement')->first();
		// // $editAnnouncement = new Permission();
		// // $editAnnouncement->name         = 'edit-announcement';
		// // $editAnnouncement->display_name = 'edit Announcements';
		// // $editAnnouncement->description  = 'edit Announcements';
		// // $editAnnouncement->save();

		// $deleteAnnouncement = Permission::where('name', '=', 'delete-announcement')->first();
		// // $deleteAnnouncement = new Permission();
		// // $deleteAnnouncement->name         = 'delete-announcement';
		// // $deleteAnnouncement->display_name = 'delete Announcements';
		// // $deleteAnnouncement->description  = 'delete Announcements';
		// // $deleteAnnouncement->save();

		// $addComment = Permission::where('name', '=', 'add-comment')->first();
		// // $addComment = new Permission();
		// // $addComment->name         = 'add-comment';
		// // $addComment->display_name = 'add Comments';
		// // $addComment->description  = 'add Comments';
		// // $addComment->save();

		// $editComment = Permission::where('name', '=', 'edit-comment')->first();
		// // $editComment = new Permission();
		// // $editComment->name         = 'edit-comment';
		// // $editComment->display_name = 'edit Comments';
		// // $editComment->description  = 'edit Comments';
		// // $editComment->save();

		// $deleteComment = Permission::where('name', '=', 'delete-comment')->first();
		// // $deleteComment = new Permission();
		// // $deleteComment->name         = 'delete-comment';
		// // $deleteComment->display_name = 'delete Comments';
		// // $deleteComment->description  = 'delete Comments';
		// // $deleteComment->save();

		// // $owner->attachPermissions(array($createPost, $editUser));
		// // $user->attachRole($admin); // parameter can be an Role object, array, or id

		// $alphaadmin->attachPermissions(array($manageAdmin, $viewProject, $addProject, $editProject, $deleteProject, $addAnnouncement, $editAnnouncement, $deleteAnnouncement, $addComment, $editComment, $deleteComment));
		// $admin->attachPermissions(array($viewProject, $addProject, $editProject, $deleteProject, $addAnnouncement, $editAnnouncement, $deleteAnnouncement, $addComment, $editComment, $deleteComment));
		// $user->attachPermissions(array($viewProject, $addComment, $editComment, $deleteComment));

		// dd('initialized bitch');
	}

	public function index()
	{
		$users = User::where('username', '!=', 'admin123')->get();
		return view('dashboard.alphaadmin', compact('users'));
	}

	public function addAdmin(Request $request)
	{
		$user = User::where('id', '=', $request->id)->first();
		$adminRole = Role::where('name', '=', 'admin')->first();

		$user->attachRole($adminRole); 
		return back();
	}

	public function revokeAdmin(Request $request)
	{
		$user = User::where('id', '=', $request->id)->first();
		// $userRole = Role::where('name', '=', 'user')->first();

		$user->roles()->detach(); 
		return back();
	}
}
