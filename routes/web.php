<?php

use Illuminate\Support\Facades\Route;
use Buki\AutoRoute\Facades\Route as AutoRoute;

// site
Route::middleware('web')
    ->name('site.')
    ->group(base_path('routes/site.php'));


// dashboard =->guest
Route::middleware('web')
    ->prefix(config('dashboard.prefix'))
    ->group(base_path('routes/dashboard/guest.php'));


// dashboard =->auth
Route::middleware('auth')
    ->name('dashboard.')
    ->prefix(config('dashboard.prefix'))
    ->group(base_path('routes/dashboard/auth.php'));


// 404
Route::fallback(function () {
    return redirect()->to('/');
});
