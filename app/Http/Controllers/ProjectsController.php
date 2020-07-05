<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->paginate(1);
        return view('projects.index')->with('projects', $projects);
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
            'title' => 'required',
            'content' => 'required',
            'link' => 'required',
            'project_image' => 'image|nullable|max:4999'
        ]);

        //Handle File Upload
        if($request->hasFile('project_image')){
            //Get File name with the extension
            $filenameWithExt = $request->file('project_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('project_image')->getClientOriginalExtension();
            //File name to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('project_image')->storeAs('public/project_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Project
        $project = new Project;
        $project->title = $request->input('title');
        $project->content = $request->input('content');
        $project->link = $request->input('link');
        $project->user_id = auth()->user()->id;
        $project->project_image = $fileNameToStore;
        $project->save();

        return redirect('/projects')->with('success', 'Project successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        //Check for correct users
        if(auth()->user()->id !==$project->user_id){
            return redirect('/projects')->with('error', 'Unauthorized Page');
        }

        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'link' => 'required'
        ]);

        //Handle File Upload
        if($request->hasFile('project_image')){
            //Get File name with the extension
            $filenameWithExt = $request->file('project_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('project_image')->getClientOriginalExtension();
            //File name to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('project_image')->storeAs('public/project_images', $fileNameToStore);

        }

        // Create Project
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->content = $request->input('content');
        $project->link = $request->input('link');
        if($request->hasFile('project_image')){
            $project->project_image = $fileNameToStore;
        }

        $project->save();

        return redirect('/projects')->with('success', 'Project Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        //Check for correct users
        if(auth()->user()->id !==$project->user_id){
            return redirect('/projects')->with('error', 'Unauthorized Page');
        }

        if($project->project_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/project_images/'.$project->project_image);
        }
        
        $project->delete();

        return redirect('/projects')->with('success', 'Project Successfully Deleted');
    }
}
