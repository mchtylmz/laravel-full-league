<?php
use Illuminate\Support\Facades\Route;

use App\Models\Board;
use App\Models\BoardMember;
use App\Models\Sponsor;

use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\Auth\LogoutController;
use \App\Http\Controllers\Admin\Home\HomeController;
use \App\Http\Controllers\Admin\Profile\ProfileController;
use \App\Http\Controllers\Admin\Board\BoardController;
use \App\Http\Controllers\Admin\Board\BoardMemberController;
use \App\Http\Controllers\Admin\Sponsor\SponsorController;
use \App\Http\Controllers\Admin\Post\PostController;
use \App\Http\Controllers\Admin\Tools\ImageController;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/save', [ProfileController::class, 'save'])->name('profile.save');
    Route::post('profile/password', [ProfileController::class, 'password'])->name('profile.password.save');

    // tools
    Route::get('tools/images', [ImageController::class, 'index'])->name('tools.images');

    // middleware admin
    Route::middleware('role:admin')->group(function () {
        // posts
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('', [PostController::class, 'index'])->name('index');
            Route::get('create', [PostController::class, 'create'])->name('create');
            Route::post('create', [PostController::class, 'store'])->name('create');
        });

        // boards & members
        Route::prefix('boards')->name('boards.')->group(function () {
            // boards
            Route::get('', [BoardController::class, 'index'])->name('index');
            Route::get('create', [BoardController::class, 'create'])->name('create');
            Route::post('create', [BoardController::class, 'store'])->name('create');
            Route::get('update/{board:id}', [BoardController::class, 'update'])->name('update');
            Route::post('update/{board:id}', [BoardController::class, 'save'])->name('update');
            Route::delete('delete/{board:id}', [BoardController::class, 'delete'])->name('delete');
            Route::get('json', [BoardController::class, 'json'])->name('json');

            // members
            Route::prefix('members')->name('members.')->group(function () {
                Route::get('', [BoardMemberController::class, 'index'])->name('index');
                Route::get('/create', [BoardMemberController::class, 'create'])->name('create');
                Route::post('/create', [BoardMemberController::class, 'store'])->name('create');
                Route::get('update/{boardMember:id}', [BoardMemberController::class, 'update'])->name('update');
                Route::post('update/{boardMember:id}', [BoardMemberController::class, 'save'])->name('update');
                Route::delete('delete/{boardMember:id}', [BoardMemberController::class, 'delete'])->name('delete');
                Route::get('json', [BoardMemberController::class, 'json'])->name('json');
            });
        });

        // sponsors
        Route::prefix('sponsors')->name('sponsors.')->group(function () {
            Route::get('', [SponsorController::class, 'index'])->name('index');
            Route::get('create', [SponsorController::class, 'create'])->name('create');
            Route::post('create', [SponsorController::class, 'store'])->name('create');
            Route::get('update/{sponsor:id}', [SponsorController::class, 'update'])->name('update');
            Route::post('update/{sponsor:id}', [SponsorController::class, 'save'])->name('update');
            Route::delete('delete/{sponsor:id}', [SponsorController::class, 'delete'])->name('delete');
            Route::get('json', [SponsorController::class, 'json'])->name('json');
        });

        // settings
        Route::redirect('activity', 'user-activity')->name('settings.activity');
        Route::prefix('settings')->name('settings.')->group(function () {

        });

    });

    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

});
