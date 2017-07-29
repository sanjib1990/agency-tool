<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAuthentication;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Social login.
     *
     * @param SocialAuthentication $socialAuth
     *
     * @return \App\Models\User|\Illuminate\Http\RedirectResponse|RedirectResponse
     */
    public function socialLogin(SocialAuthentication $socialAuth)
    {
        $auth = $socialAuth->execute(request());

        if ($auth instanceof RedirectResponse) {
            return $auth;
        }

        return redirect()->route('home');
    }
}
