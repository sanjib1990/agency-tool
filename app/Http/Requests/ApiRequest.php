<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidUserInputException;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class ApiRequest
 *
 * @package App\Http\Requests
 */
abstract class ApiRequest extends Request
{
    /**
     * @param Validator $validator
     *
     * @return array|void
     * @throws InvalidUserInputException
     */
    protected function formatErrors(Validator $validator)
    {
        throw new InvalidUserInputException(null, 400, null, $validator->errors());
    }
}
