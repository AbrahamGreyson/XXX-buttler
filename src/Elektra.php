<?php

namespace Elektra;

use Illuminate\Support\Facades\Facade;

class Elektra extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'elektra';
    }
}
