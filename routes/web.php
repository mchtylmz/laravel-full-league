<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $user = \App\Models\User::find(1);

    $roles = \App\Models\Role::where('level', \App\Enums\RoleLevelEnum::REFEREE_OBSERVER)->get();

    $type = 5;

    //dd(\App\Enums\RoleLevelEnum::tryFrom($type));
    //dd(\App\Enums\RoleLevelEnum::cases());
    //dd($roles);
    //dd($user->metas()->get());
    dd($user->image()->first());

    return view('welcome');
});

Auth::routes();

Route::get('/user/{user:username}', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
//Route::get('/user/{user}', [App\Http\Controllers\HomeController::class, 'user'])->name('user');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
