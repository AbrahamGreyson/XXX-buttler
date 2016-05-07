<?php

namespace Elektra;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ElektraServiceProvider extends ServiceProvider
{
    /**
     * Supported components.
     *
     * @var array
     */
    private $components = [
        'web-artisan' => [],
        'pjax'        => [],
    ];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('elektra', function () {
            return new Factory();
        });
    }

    public function boot()
    {
        $this->setComponents();
        $this->publishComponentsConfig();
        $this->registerComponentsProvider();
    }

    /**
     * Publish components config file.
     */
    private function publishComponentsConfig()
    {
        $this->mapComponents(function ($component) {
            if (file_exists($from = "{$component['path']}/config.php")) {
                $filename = strtolower($component['dir']);
                $this->publishes([
                    $from => config_path("elektra-{$filename}.php"),
                ]);
            }
        });
    }

    /**
     * Register components provider.
     */
    private function registerComponentsProvider()
    {
        $this->mapComponents(function ($component) {
            if (class_exists($component['provider'])) {
                $this->app->register($component['provider']);
            }
        });
    }

    /**
     * Use callback map every single component.
     *
     * @param \Closure $callback
     */
    private function mapComponents(\Closure $callback)
    {
        foreach ($this->components as $name => $component) {
            $callback($component);
        }
    }

    /**
     * Set components basic info.
     */
    private function setComponents()
    {
        array_walk($this->components, function (&$value, $key) {
            $name = $dir = Str::studly($key);
            $path = __DIR__ . "/{$dir}";
            $provider = "\\Elektra\\{$dir}\\{$name}ServiceProvider";

            $value = compact('dir', 'path', 'provider');
        });
    }
}

