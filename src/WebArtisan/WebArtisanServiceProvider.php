<?php

namespace Elektra\WebArtisan;

use Illuminate\Support\ServiceProvider;

class WebArtisanServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    public function boot()
    {
        $this->registerRoutes();
    }

    private function registerRoutes()
    {
    }
}
