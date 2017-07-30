<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function show()
    {
        return view('projects.show');
    }

    public function create()
    {
        return view('projects.create');
    }
}
