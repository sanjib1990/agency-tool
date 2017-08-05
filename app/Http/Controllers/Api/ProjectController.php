<?php

namespace App\Http\Controllers\Api;

use App\Models\Stage;
use App\Models\Project;
use App\Transformers\ProjectsTransformer;
use App\Utils\Transformer;
use App\Http\Controllers\Controller;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers\Api
 */
class ProjectController extends Controller
{
    /**
     * @var Stage
     */
    private $stage;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var Transformer
     */
    private $transformer;

    /**
     * ProjectController constructor.
     *
     * @param Stage       $stage
     * @param Project     $project
     * @param Transformer $transformer
     */
    public function __construct(Stage $stage, Project $project, Transformer $transformer)
    {
        $this->stage        = $stage;
        $this->project      = $project;
        $this->transformer  = $transformer;
    }

    /**
     * Get all the project statuses.
     *
     * @return mixed
     */
    public function statuses()
    {
        return response()->jsend($this->stage->getNamePercent(), trans('api.success'));
    }

    /**
     * Get the list of projets.
     *
     * @return mixed
     */
    public function get()
    {
        return response()->jsend(
            $this->transformer->process(
                $this->project->list(),
                new ProjectsTransformer()
            ),
            trans('api.success')
        );
    }
}
