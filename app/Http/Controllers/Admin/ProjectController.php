<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['serach'])){
            $search = $_GET['search'];
            $projects = Project::where('name', 'like', '%search%')->paginate(10);
        }else{
            $projects = Project::orderBy('id', 'desc')->paginate(8);
        }

        $direction = 'desc';
        return view('admin.projects.index', compact('projects', 'direction'));
    }

    public function orderby($column, $direction){
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $projects = Project::orderBy($column, $direction)->paginate(8);
        return view('admin.projects.index', compact('direction', 'projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project_data = $request->all();
        $project_data['slug'] = Project::generateSlug($project_data['name']);

        if(array_key_exists('cover_image', $project_data)){
            $project_data['cover_image_original_name'] = $request->file('cover_image')->getClientOriginalName();

            $project_data['cover_image'] = Storage::put('uploads', $project_data['cover_image']);
        }

        $new_project = Project::create($project_data);

        return redirect()->route('admin.projects.show', $new_project)->with('message', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $project_data = $request->all();
        if($project_data['name'] != $project->name){
            $project_data['slug'] = Project::generateSlug($project_data['name']);
        }else{
            $project_data['slug'] = $project->slug;
        }

        if(array_key_exists('cover_image', $project_data)){
            if($project->cover_image){
                Storage::disk('public')->delete($project->cover_image);
            }
            $project_data['cover_image_original_name'] = $request->file('cover_image')->getClientOriginalName();
            $project_data['cover_image'] = Storage::put('uploads', $project_data['image']);
        }

        $project->update($project_data);
        return redirect()->route('admin.projects.show', $project)->with('message', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if($project->cover_image){
            Storage::disk('public')->delete($project->cover_image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('deleted', 'Project deleted successfully.');
    }
}
