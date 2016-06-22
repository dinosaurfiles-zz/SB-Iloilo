<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class ProfilesController extends Controller
{
    // public function update()
    // {
    // 	dd('update profile bitch!');
    // }

    public function show($profile)
    {
    	$user_profile = User::where('username', 'like', $profile)->first();
    	$user_projects = $user_profile->projects;
    	return view('profiles.profile', compact('user_profile', 'user_projects'));
    }
}
