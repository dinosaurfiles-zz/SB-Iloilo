<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;

use App\Announcement;

use Auth;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:10'
        ]);

        $announcement = new Announcement([
            'project_id' => $project->id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        $announcement->save();

        return redirect()->action('ProjectsController@show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Announcement $announcement)
    {
        return view('announcements.edit', compact('project', 'announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Announcement $announcement)
    {
        $announcement->content = $request->content;
        $announcement->save();

        return redirect()->action('ProjectsController@show', ['project' => $project->id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->action('ProjectsController@show', ['project' => $project->id]);
    }
}

