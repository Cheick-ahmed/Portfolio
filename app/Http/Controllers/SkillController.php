<?php

namespace App\Http\Controllers;

use App\Http\Requests\Skill\CreateSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Http\Resources\SkillResource;
use App\Skill;

class SkillController extends Controller
{
    public function index()
    {
        return SkillResource::collection(Skill::all());
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function store(CreateSkillRequest $request)
    {
        $skill = Skill::create($request->only('name', 'description', 'level', 'category'));

        return new SkillResource($skill);
    }

    public function update(UpdateSkillRequest $request ,Skill $skill)
    {
        $skill->update($request->only('name', 'category', 'level', 'description'));
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
    }
}
