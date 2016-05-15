<?php

namespace Elektra\WebArtisan\Controllers;

use Illuminate\Routing\Controller;

class LogController extends Controller
{
    public function index($type = null)
    {
        
        return view('elektra-webartisan::index');
    }

    public function show($generator = null)
    {
    }
}
