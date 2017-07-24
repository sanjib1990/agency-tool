<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\ApiRequest;

/**
 * Class TokenRequest
 *
 * @package App\Http\Requests\Api
 */
class TokenRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"     => "required | exists:users,email",
            "password"  => "required"
        ];
    }
}
