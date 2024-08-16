<?php

use Illuminate\Support\Facades\Route;
use Buki\AutoRoute\Facades\Route as AutoRoute;

Route::get('logout', [\App\Http\Controllers\Dashboard\Auth\LogoutController::class, 'index'])->name('logout');

AutoRoute::auto('', \App\Http\Controllers\Dashboard\HomeController::class, [
    'name' => 'home'
]);
