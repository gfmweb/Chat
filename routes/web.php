<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RateLimit;

Route::get('/test', [\App\Http\Controllers\TypokController::class, 'index'])
    ->middleware(RateLimit::class)->name('home');
