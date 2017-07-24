<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Interface ApiAuthenticateContract
 *
 * @package App\Contracts
 */
interface ApiAuthenticateContract
{
    /**
     * Authenticate the user and generate token.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function token(array $data);

    /**
     * Refrest the generated token.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function refreshToken(Request $request);

    /**
     * Validate the authentication token.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function validate(array $data);

    /**
     * Get Token from user object.
     *
     * @param User $user
     *
     * @return string
     */
    public function getTokenByUser(User $user);
}
