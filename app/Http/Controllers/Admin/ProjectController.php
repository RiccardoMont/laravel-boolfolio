<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(6)]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.projects.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        
        $validated = $request->validated();

        if($request->has('cover_image')){

            $validated['cover_image'] = Storage::put('uploads', $request->cover_image);
            
        }


        Project::create($validated);

        return to_route('admin.projects.index')->with('message', 'New project created successfully!');




    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        
        return view('admin.projects.edit', compact('project'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $validated = $request->validated();
        

        if ($request->has('cover_image')){

            if($project->cover_image){

                Storage::delete($project->cover_image);

            }

            $image_path = Storage::put('uploads', $request->cover_image);

            $validated['cover_image'] = $image_path;

        }

        $project->update($validated);

        return to_route('admin.projects.index')->with('message', 'Project updated succesfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        
        if($project->cover_image && !Str::startsWith($project->cover_image, 'https://')){

            Storage::delete($project->cover_image);

        }

        $project->delete();

        return to_route('admin.projects.index')->with('message', 'Project deleted!');


    }
}
