<?php

namespace Elektra\WebArtisan\Controllers;

use Illuminate\Routing\Controller;

class GeneratorController extends Controller
{
    public function index()
    {
        return view('elektra-webartisan::index');
    }

    public function show($generator = null)
    {
    }
}
