<?php

namespace SpkApp\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
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
        $this->app->bind('spk.helper', \SpkApp\Helpers\SpkHelper::class);
    }
}