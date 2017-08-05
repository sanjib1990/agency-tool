<?php

namespace App\Http\Controllers;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Show project info page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('projects.create', ['show' => true]);
    }

    /**
     * Show project create page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('projects.create');
    }
}
