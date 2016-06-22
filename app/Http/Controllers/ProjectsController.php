<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;

use Auth;

class ProjectsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        // $this->middleware('admin', ['except' => 'index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10|max:255',
            'description' => 'required|min:10',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg'
        ]);


        $project = new Project([
            'title' => $request->title,
            'user_id' => Auth::id() ,
            'description' => $request->description,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        $project->save();

        if ($request->image) {
            $imageName = 'project-' . $project->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path() . '/public/images/projects/', $imageName);

            $project->image = $imageName;
            $project->save();
        }

        return redirect()->action('ProjectsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.view', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required|min:10|max:255',
            'description' => 'required|min:10',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg'
        ]);

        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;

        $project->save();

        if ($request->image) {
            $imageName = 'project-' . $project->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path() . '/public/images/projects/', $imageName);

            $project->image = $imageName;
            $project->save();
        }

        return redirect()->action('ProjectsController@show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->action('ProjectsController@index');
    }

    public function search(Request $request){
        $search_string = $request->search;
        $search_results = Project::where('description', 'like', '%'.$search_string.'%')->orWhere('title', 'like', '%'.$search_string.'%')->get();

        return view('projects.search', compact('search_string', 'search_results'));
    }
}
