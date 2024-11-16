<?php

use Mertcanaydin97\LaravelPaytr\Controllers;
use Illuminate\Support\Facades\Route;
use Mertcanaydin97\LaravelPaytr\Controllers\LaravelPaytrController;

Route::get('check', LaravelPaytrController::class);
