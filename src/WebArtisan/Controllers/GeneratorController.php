<?php

namespace Elektra\WebArtisan\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GeneratorController extends Controller
{
    public function index(Request $request, $type = null)
    {
        return view('elektra-webartisan::index');
    }

    public function show($generator = null)
    {
    }

    public function store($type = null)
    {
        $artisan = app()->make(\Illuminate\Contracts\Console\Kernel::class);
        $artisan->call('make:model', ['name' => 'Daha']);

        dd($artisan->output());
    }
}
