<?php

namespace App\Facades;

use \Illuminate\Support\Facades\Facade;

class Person extends Facade {
    public static function getFacadeAccessor()
    {
        return 'name';
    }
}
