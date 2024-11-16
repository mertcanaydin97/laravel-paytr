<?php
namespace Mertcanaydin97\LaravelPaytr\Controllers;

use Illuminate\Http\Request;
use Mertcanaydin97\LaravelPaytr\LaravelPaytr;

class LaravelPaytrController
{
    public function __invoke(LaravelPaytr $laravelPaytr) {

        $form = $laravelPaytr->paymentForm();

        return $form;
    }
}
