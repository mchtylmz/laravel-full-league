<?php
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\Auth\LogoutController;
use \App\Http\Controllers\Admin\Home\HomeController;
use \App\Http\Controllers\Admin\Board\BoardController;
use \App\Http\Controllers\Admin\Board\BoardMemberController;
use \App\Http\Controllers\Admin\Post\PostController;

// AUTH
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::prefix('posts')->group(function () {
        Route::get('', [PostController::class, 'index'])->name('posts');
    });

    Route::prefix('boards')->group(function () {
        Route::get('', [BoardController::class, 'index'])->name('boards');
        Route::get('json', [BoardController::class, 'json'])->name('boards.json');

        Route::get('members', [BoardMemberController::class, 'index'])->name('boards.members');
        Route::get('members/json', [BoardMemberController::class, 'json'])->name('boards.members.json');
    });

    Route::prefix('sponsors')->group(function () {
        Route::get('', [BoardController::class, 'index'])->name('sponsors');
    });

    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

});
