<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers\Api
 */
class ProjectController extends Controller
{
    /**
     * Get all the project statuses.
     *
     * @return mixed
     */
    public function statuses()
    {
        return response()->jsend(config('project.project_status_order'), trans('api.success'));
    }
}
