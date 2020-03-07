<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Http\Resources\SkillResource;
use App\Project;
use App\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        $basics = [
            'name' => 'Sidibé Cheick ahmed',
            'email' => 'chs.ahmed_pro02@outlook.com',
            'phone' => '+336 59 02 23 57'
        ];

        $socials = [];


        return view('index', [
            'frontEnd' => SkillResource::collection(Skill::frontEnd()->get()),
            'backEnd' => SkillResource::collection(Skill::backEnd()->get()),
            'devops' => SkillResource::collection(Skill::devops()->get()),
            'tools' => SkillResource::collection(Skill::tools()->get()),
            'projects' => ProjectResource::collection(Project::latest()->get())
        ]);
    }
}
