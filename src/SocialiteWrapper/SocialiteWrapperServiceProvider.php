<?php

namespace Kneipp\SocialiteWrapper;

use Illuminate\Support\ServiceProvider;

class SocialiteWrapperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Laravel\Socialite\SocialiteServiceProvider');

        $this->prepareResources();

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    protected function prepareResources()
    {
        // Publish migrations
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('/migrations'),
        ], 'migrations');
    }
}
