<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\CreateSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        return view('admin.skills.index', [
            'skills' => SkillResource::collection(Skill::latest()->paginate(10))
        ]);
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(CreateSkillRequest $request, Skill $skill)
    {
        $skill->create(
            $request->only('name', 'description', 'level', 'category')
        );

        return redirect()->route('admin.skills.index');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', [
            'skill' => $skill
        ]);
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $skill->update(
            $request->only('name', 'description')
        );

        return redirect()->route('admin.skills.index');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->back();
    }
}
