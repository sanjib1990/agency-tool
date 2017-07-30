<?php

namespace App\Http\Controllers\Api;

use App\Services\UploadService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UploadRequest;

/**
 * Class UploadController
 *
 * @package App\Http\Controllers\Common\Api
 */
class UploadController extends Controller
{
    /**
     * Upload a file.
     *
     * @param UploadRequest $request
     * @param UploadService $service
     *
     * @return mixed
     */
    public function create(UploadRequest $request, UploadService $service)
    {
        return response()->jsend($service->process($request, 'file'), trans('api.success'), 201);
    }
}
