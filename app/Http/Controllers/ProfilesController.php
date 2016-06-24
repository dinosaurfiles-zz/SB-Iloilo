<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ProfilesController extends Controller
{
    public function show($profile)
    {
    	$user_profile = User::where('username', 'like', $profile)->first();
    	$user_projects = $user_profile->projects;
    	return view('profiles.profile', compact('user_profile', 'user_projects'));
    }

    public function initialPermissions()
    {
        $alphaAdmin = new Role();
        $alphaAdmin->name         = 'alphaAdmin';
        $alphaAdmin->display_name = 'Alpha Administrator'; // optional
        $alphaAdmin->description  = 'Overlord'; // optional
        $alphaAdmin->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator'; // optional
        $admin->description  = 'Create/Add|View|Edit|Delete = Projects, Comments, Announcements, Members';
        $admin->save();

        $user = new Role();
        $user->name = 'user';
        $user->display_name = 'User';
        $user->description = 'Create/Add|View|Edit|Delete = Comments, View = Projects';
        $user->save();

        // $user = User::where('username', '=', 'michele')->first();

        // // role attach alias
        // $user->attachRole($admin);

        $manipulateProject = new Permission();
        $manipulateProject->name         = 'manipulate-project';
        $manipulateProject->display_name = 'manipulate Projects';
        $manipulateProject->description  = 'manipulate Projects';
        $manipulateProject->save();
    }
}
