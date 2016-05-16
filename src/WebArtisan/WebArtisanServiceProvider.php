<?php

namespace Elektra\WebArtisan;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Laracasts\Flash\Flash;
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
        if ('local' == $this->app->environment()) {
            // Register facade here so we don't have to bother user with dependencies.
            $loader = AliasLoader::getInstance();
            $loader->alias('Flash', Flash::class);
        }
    }

    public function boot()
    {
        if ('local' == $this->app->environment()) {
            $this->publishAssets();
            $this->registerResources();
            $this->registerRoutes();
            $this->registerDependencies();
            $this->registerHelperFunctions();
        }
    }

    /**
     * Register routes.
     */
    private function registerRoutes()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app['router'];
        $router->group([
            'namespace'  => __NAMESPACE__ . "\\Controllers",
            'prefix'     => $this->app['config']->get('elektra-webartisan.route_prefix'),
            'middleware' => ['web'],
        ], function ($router) {
            /** @var \Illuminate\Routing\Router $router */
            $router->get('/', function () {
                return 'elektra index';
            });
            $router->get('/generator', 'GeneratorController@index')->name('elektra.generator');
            $router->get('/generator/{generator}', 'GeneratorController@show')->name('elektra.generator.{generator}');
            $router->post('/generator/{generator}', 'GeneratorController@generate');
            $router->resources([
                'log'               => 'LogController',
                'migration'         => 'MigrationController',
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

    private function registerHelperFunctions()
    {
        include 'functions.php';
    }
}
