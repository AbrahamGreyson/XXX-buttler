<?php

namespace Elektra\WebArtisan;

use Illuminate\Support\ServiceProvider;
use Laracasts\Flash\FlashServiceProvider;

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
        $this->publishAssets();
        $this->registerResources();
        $this->registerRoutes();
        $this->registerDependencies();
    }

    /**
     * Register routes.
     */
    private function registerRoutes()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app['router'];
        $router->group([
            'namespace' => __NAMESPACE__ . "\\Controllers",
            'prefix'    => $this->app['config']->get('elektra-webartisan.route_prefix'),
        ], function ($router) {
            /** @var \Illuminate\Routing\Router $router */
            $router->resources([
                'generator/{type?}' => 'GeneratorController',
                'log'       => 'LogController',
                'migration' => 'MigrationController',
            ]);
        });
    }

    /**
     * Register resource files.
     */
    private function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'elektra-webartisan');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'elektra-webartisan');
    }

    /**
     * Publish assets.
     */
    private function publishAssets()
    {
        $this->publishes([
            __DIR__ . '/resources/assets' => public_path('vendor/elektra-webartisan'),
        ]);
    }

    /**
     * Register php dependencies.
     */
    private function registerDependencies()
    {
        $this->app->register(
            FlashServiceProvider::class
        );
    }
}
