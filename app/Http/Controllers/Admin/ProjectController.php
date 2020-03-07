<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Image;
use App\Project;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::latest()->paginate(20)
        ]);
    }

    public function create()
    {
        $skills = Skill::pluck('name', 'id');
        return view('admin.projects.create', [
            'skills' => $skills
        ]);
    }

    public function store(CreateProjectRequest $request)
    {

        $project = new Project();
        $project->name = $request->name;
        $project->website = 'http://' . $request->website;
        $project->githubUrl = $request->githubUrl;
        $project->description = $request->description;

        $project->save();
        $project->skills()->attach($request->skills);
        $project->images()->attach($request->image_id);

        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project
        ]);
    }


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update(
            $request->only('name', 'website', 'githubUrl', 'description')
        );

        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        $i = $project->images()->first();

        $project->images()->detach($project->images()->first());

        Storage::disk('public')->delete('images/' . $i->hash_name);

        Image::destroy($i->id);

        $project->delete();

        return redirect()->back();
    }
}
