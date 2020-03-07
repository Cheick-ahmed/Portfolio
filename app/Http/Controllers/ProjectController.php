<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(CreateProjectRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->website = $request->website;
        $project->githubUrl = $request->githubUrl;
        $project->description = $request->description;

        $project->save();

        $project->images()->attach($request->image_id);

        return new ProjectResource($project);

    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update(
            $request->only('name', 'website', 'githubUrl', 'description')
        );
    }

    public function destroy(Project $project)
    {
        $i = $project->images()->first();

        $project->images()->detach($project->images()->first());

        Storage::disk('public')->delete('images/' . $i->hash_name);

        Image::destroy($i->id);

        $project->delete();
    }
}
