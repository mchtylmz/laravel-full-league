<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

/* ***************************************** */
// backend and frontend login
Route::middleware('guest')
    ->controller(\App\Http\Controllers\Backend\Auth\LoginController::class)
    ->prefix(config('backend.prefix'))
    ->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'store')->name('login');
    });

// backend
Route::name('admin.')
    ->middleware(['auth', 'can:admin:access'])
    ->prefix(config('backend.prefix'))
    ->group(base_path('routes/backend.php'));
