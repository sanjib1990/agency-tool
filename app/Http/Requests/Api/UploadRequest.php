<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiRequest;

/**
 * Class UploadRequest
 *
 * @package App\Http\Requests\CommonRequests\V1
 */
class UploadRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return  [
            'file'      => 'required | file',
            'path'      => 'string',
            'storage'   => 'in:s3,uploads',
            'file_name' => 'string',
        ];
    }
}
