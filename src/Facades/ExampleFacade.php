<?php

namespace App\Patterns\Facades;

use Illuminate\Support\Facades\Facade;

class ExampleFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'example-facade-service';
    }
}
