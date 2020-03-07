<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        return view('archives', [
            'projects' => Project::latest()->get()
        ]);
    }
}
