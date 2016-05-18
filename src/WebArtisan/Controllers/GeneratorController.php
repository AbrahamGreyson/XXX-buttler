<?php

namespace Elektra\WebArtisan\Controllers;

use Elektra\WebArtisan\Command;
use Elektra\WebArtisan\Requests\GeneratorRequest;
use Illuminate\Routing\Controller;

class GeneratorController extends Controller
{
    protected $generatorMap = [
        'model',
        'migration',
        'controller',
        'crud',
        'console',
        'middleware',
        'request',
        'provider',
        'policy',
        'event',
        'job',
        'seeder',
        'listener',
        'test',
        'auth'
    ];

    /**
     * @var \Elektra\WebArtisan\Command
     */
    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function index()
    {

        return view('elektra-webartisan::generator.index');
    }

    public function show($generator)
    {
        return view("elektra-webartisan::generator.{$generator}");
    }

    public function generate(GeneratorRequest $request, $generator)
    {
        $result = $this->command->call($generator, $this->generatorMap, $request);

        if ($result) {
            \Flash::message($result['output'], $result['level']);
        }

        return redirect()->back();
    }
}
