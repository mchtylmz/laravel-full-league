<?php

use Illuminate\Support\Facades\Route;

Route::get('login', [\App\Http\Controllers\Dashboard\Auth\LoginController::class, 'index'])
    ->name('login');
