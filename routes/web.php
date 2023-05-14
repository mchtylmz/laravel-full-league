<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\AdminHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes(['register' => false]);

Route::get('/detail/{post:slug}', [HomeController::class, 'detail'])->name('post.detail');

Route::middleware(['auth'])->group(function () {
    // admin
    Route::prefix(env('APP_ADMIN_PREFIX'))->name('admin.')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    });

    // profile

});
