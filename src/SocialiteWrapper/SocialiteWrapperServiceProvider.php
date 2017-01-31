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

        $this->loadRoutesFrom(realpath(__DIR__.'/routes/web.php'));
    }

    protected function prepareResources()
    {
        // Publish migrations
        $migrations = realpath(__DIR__.'/database/migrations');
        $this->publishes([
            $migrations => database_path('/migrations'),
        ], 'migrations');
    }
}
