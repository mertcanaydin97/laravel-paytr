<?php
namespace Mertcanaydin97\LaravelPaytr\Exceptions;


use Exception;
use Throwable;

abstract class Paytr extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
