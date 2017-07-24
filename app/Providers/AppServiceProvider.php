<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * Class AppServiceProvider
 *
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this
            ->bootSingleton()
            ->bootMacros()
            ->bootContracts();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'prod') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Boot Singletons for the APP.
     *
     * @return $this
     */
    public function bootSingleton()
    {
        // Singleton for Fractal
        $this->app->singleton('League\Fractal\Manager', function () {
            return new Manager();
        });

        // Singleton for Resource factory
        $this->app->singleton('App\Utils\Factory', function () {
            return new Factory('League\\Fractal\\Resource');
        });

        return $this;
    }

    /**
     * Boot Macros for App.
     *
     * @return $this
     */
    public function bootMacros()
    {
        /**
         * Macro for response
         */
        $this
            ->app
            ->make(ResponseFactory::class)
            ->macro('jsend', function ($data = null, $message = null, $code = 200, $status = 'success') {
                if ($message instanceof MessageBag) {
                    $message = $message->first();
                }

                if ($code >= 200 && $code < 300) {
                    $status = 'success';
                } elseif ($code >= 400 && $code < 500) {
                    $status = 'fail';
                } elseif ($code >= 500) {
                    $status = 'error';
                }

                return $this->json([
                    'status'    => $status,
                    'message'   => $message,
                    'data'      => $data
                ], $code);
            });

        return $this;
    }

    /**
     * Boot the interface bindings with models.
     *
     * @return $this
     */
    public function bootContracts()
    {
        $this->app->bind(
            'App\Contracts\ApiAuthenticateContract',
            'App\Utils\JwtAuthenticator'
        );

        return $this;
    }
}
