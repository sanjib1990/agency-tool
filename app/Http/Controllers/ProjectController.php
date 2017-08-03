<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
    public function show()
    {
        return view('projects.create', ['show' => true]);
    }

    public function create()
    {
        return view('projects.create');
    }
}
