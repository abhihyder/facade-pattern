<?php

namespace App\Repositories\Facades;

use Illuminate\Support\Facades\Facade;

class ExampleFacade extends Facade
{

    public static function getFacadeAccessor()
    {
        return 'example-facade-service';
    }
}
