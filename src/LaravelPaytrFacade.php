<?php

namespace Mertcanaydin97\LaravelPaytr;

use Illuminate\Support\Facades\Facade;

class LaravelPaytrFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LaravelPaytr::class;
    }
}
