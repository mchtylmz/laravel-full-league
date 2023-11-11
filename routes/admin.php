<?php
use Illuminate\Support\Facades\Route;

use App\Models\Board;
use App\Models\BoardMember;

use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\Auth\LogoutController;
use \App\Http\Controllers\Admin\Home\HomeController;
use \App\Http\Controllers\Admin\Profile\ProfileController;
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
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/save', [ProfileController::class, 'save'])->name('profile.save');
    Route::post('profile/password', [ProfileController::class, 'password'])->name('profile.password.save');

    // middleware admin
    Route::middleware('role:admin')->group(function () {
        Route::prefix('posts')->group(function () {
            Route::get('', [PostController::class, 'index'])->name('posts');
        });

        Route::prefix('boards')->group(function () {
            Route::get('', [BoardController::class, 'index'])->name('boards');
            Route::get('create', [BoardController::class, 'create'])->name('boards.create');
            Route::post('create', [BoardController::class, 'store'])->name('boards.create');
            Route::get('update/{board:id}', [BoardController::class, 'update'])->name('boards.update');
            Route::post('update/{board:id}', [BoardController::class, 'save'])->name('boards.update');
            Route::delete('delete/{board:id}', [BoardController::class, 'delete'])->name('boards.delete');
            Route::get('json', [BoardController::class, 'json'])->name('boards.json');

            Route::prefix('members')->name('boards.')->group(function () {
                Route::get('', [BoardMemberController::class, 'index'])->name('members');
                Route::get('/create', [BoardMemberController::class, 'create'])->name('members.create');
                Route::post('/create', [BoardMemberController::class, 'store'])->name('members.create');
                Route::get('update/{boardMember:id}', [BoardMemberController::class, 'update'])->name('members.update');
                Route::post('update/{boardMember:id}', [BoardMemberController::class, 'save'])->name('members.update');
                Route::delete('delete/{boardMember:id}', [BoardMemberController::class, 'delete'])->name('members.delete');
                Route::get('json', [BoardMemberController::class, 'json'])->name('members.json');
            });
        });

        Route::prefix('sponsors')->group(function () {
            Route::get('', [BoardController::class, 'index'])->name('sponsors');
        });

        Route::redirect('activity', 'user-activity')->name('activity');
    });

    Route::get('logout', [LogoutController::class, 'index'])->name('logout');

});
