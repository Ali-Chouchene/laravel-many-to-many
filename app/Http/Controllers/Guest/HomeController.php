<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->where('status', 1)->simplePaginate(5);
        return view('guest.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('guest.projects.show', compact('project'));
    }
}
