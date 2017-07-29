<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Two\ProviderInterface;

/**
 * Class SocialAuthentication
 *
 * @package App\Http\Controllers\Auth
 */
class SocialAuthentication
{
    /**
     * @var ProviderInterface
     */
    public $loginProvider;

    /**
     * @var User
     */
    private $users;

    /**
     * @var Factory
     */
    private $socialite;

    /**
     * @var Guard
     */
    private $auth;

    /**
     * SocialAuthentication constructor.
     *
     * @param User    $user
     * @param Guard   $auth
     * @param Factory $socialite
     */
    public function __construct(
        User $user,
        Guard $auth,
        Factory $socialite
    ) {
        $this->auth         = $auth;
        $this->users        = $user;
        $this->socialite    = $socialite;
    }

    /**
     * @param Request $request
     *
     * @return \App\Models\User|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function execute(Request $request)
    {
        if (! $this->loginProvider) {
            $this->setProvider($request->provider);
        }

        if (! $request->has('code') && ! $request->has('oauth_token') && ! $request->has('oauth_verifier')) {
            return $this->getAuthorization($request);
        }

        $data   = $this->getUserDataByProvider($this->getSocialUser(), $request->provider);
        $user   = $this->users->findByEmailOrCreate($data);

        $this->auth->login($user, true);

        return $user;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorization()
    {
        return $this->loginProvider->redirect();
    }

    /**
     * @return \Laravel\Socialite\Contracts\User
     */
    private function getSocialUser()
    {
        return $this->loginProvider->user();
    }

    /**
     * Set Social Logiin provider.
     *
     * @param $provider
     *
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->loginProvider  = $this->socialite->driver($provider);

        return $this;
    }

    /**
     * Get user data by provider.
     *
     * @param $data
     * @param $provider
     *
     * @return mixed
     */
    protected function getUserDataByProvider($data, $provider)
    {
        $func   = 'get'.camel_case($provider).'Data';

        return $this->{$func}($data);
    }

    /**
     * Get Linkedin user data.
     *
     * @param $data
     *
     * @return array
     */
    protected function getLinkedinData($data)
    {
        return [
            'fname'     => get_data($data, 'user.firstName'),
            'lname'     => get_data($data, 'user.lastName'),
            'email'     => get_data($data, 'email'),
            'avatar'    => get_data($data, 'avatar')
        ];
    }

    /**
     * Get google user data.
     *
     * @param $data
     *
     * @return array
     */
    protected function getGoogleData($data)
    {
        return [
            'fname'     => get_data($data, 'user.name.givenName'),
            'lname'     => get_data($data, 'user.name.familyName'),
            'email'     => get_data($data, 'email'),
            'avatar'    => get_data($data, 'avatar')
        ];
    }
}
