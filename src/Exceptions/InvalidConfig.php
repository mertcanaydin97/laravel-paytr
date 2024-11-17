<?php
namespace Mertcanaydin97\LaravelPaytr\Exceptions;

class InvalidConfig extends Paytr
{
    public static function configNotFound()
    {
        return new static('Setup your credentials to config.paytr');
    }
}
