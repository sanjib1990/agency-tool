<?php

namespace App\Http\Requests;

use App\Exceptions\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Request
 *
 * @package App\Http\Requests
 */
abstract class Request extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
