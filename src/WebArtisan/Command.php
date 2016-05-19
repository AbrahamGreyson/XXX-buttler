<?php

namespace Elektra\WebArtisan;

class Command
{
    /**
     * @var \Illuminate\Foundation\Console\Kernel
     */
    private $artisan;

    public function __construct(\Illuminate\Foundation\Console\Kernel $artisan)
    {
        $this->artisan = $artisan;
    }

    /**
     * Call a artisan command.
     *
     * @param  string                   $generator
     * @param  array                    $generatorMap
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function call($generator, array $generatorMap, $request)
    {
        if (!in_array($generator, $generatorMap)) {
            throw new \InvalidArgumentException("Generator [{$generator}] is not available.");
        }

        $method = "make{$generator}";

        return call_user_func_array([$this, $method], [$request->all()]);
    }

    public function makeJob(array $options)
    {
        $name = ucwords($options['name']);

        return $this->callLaravel('make:job', [
            'name' => $name,
            '--sync' => isset($options['sync'])
        ]);
    }

    public function makeEvent(array $options)
    {
        $name = ucwords($options['name']);

        return $this->callLaravel('make:event', [
            'name' => $name,
        ]);
    }

    public function makeController(array $options)
    {
        $name = ucwords($options['name']);

        return $this->callLaravel('make:controller', [
            'name'       => $name,
            '--resource' => isset($options['resource']),
        ]);
    }

    public function makeConsole(array $options)
    {
        $name = ucwords($options['name']);

        return $this->callLaravel('make:console', [
            'name' => $name,
        ]);
    }

    public function makeAuth(array $options)
    {

        // todo determine if file is exists.
        if (isset($options['overwrite'])) {
        }

        return $this->callLaravel('make:auth', [
            '--views' => isset($options['views']),
        ]);
    }

    public function makeMigration(array $options)
    {
        $name = $this->getMigrationName($options['name']);

        // todo table name.

        return $this->callLaravel('make:migration', [
            'name' => $name,
        ]);
    }

    public function makeModel(array $options)
    {
        $name = ucwords($options['name']);

        return $this->callLaravel('make:model', [
            'name'        => $name,
            '--migration' => isset($options['migration']),
        ]);
    }

    /**
     * Call the Laravel command to generate file.
     *
     * @param string $command
     * @param array  $parameters
     *
     * @return array
     */
    private function callLaravel($command, array $parameters)
    {
        $level = 'info';
        try {
            $this->artisan->call($command, $parameters);
            $output = $this->artisan->output();
        } catch (\Exception $e) {
            $output = $e->getMessage();
            $level = 'danger';
        }

        return compact('output', 'level');
    }

    /**
     * Convert the name if contains space to snake style.
     *
     * @param string $name
     *
     * @return string
     */
    private function getMigrationName($name)
    {
        $name = array_filter(explode(' ', $name));

        return 1 < count($name) ? implode('_', $name) : $name[0];
    }
}
