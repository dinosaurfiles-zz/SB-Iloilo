<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;

use App\User;

use App\Member;

class MembersController extends Controller
{
    public function store(Project $project, Request $request)
    {
		if (! (Member::where('member_id', '=', $request->memberId)->where('project_id', '=', $project->id)->exists())) {
			$member = new Member([
	            'member_id' => $request->memberId,
	            'project_id' => $project->id ,
	            'role' => $request->role,
	        ]);

	        $member->save();
		}
		return redirect()->action('ProjectsController@show', ['project' => $project->id]);
    }
    
    public function search(Project $project, Request $request)
    {   
        $search_string = $request->search;
        $users = User::where('first_name', 'like', '%'.$search_string.'%')->orWhere('last_name', 'like', '%'.$search_string.'%')->orWhere('username', 'like', '%'.$search_string.'%')->get();
        return view('members.add', compact('project', 'search_string', 'users'));
    }

    public function destroy(Project $project, Member $member){
        $member->delete();

		return redirect()->action('ProjectsController@show', ['project' => $project->id]);
    }
}
