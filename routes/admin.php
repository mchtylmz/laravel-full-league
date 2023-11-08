<?php
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\Auth\LogoutController;
use \App\Http\Controllers\Admin\Home\HomeController;

// AUTH
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

});
