<?php

use Buki\AutoRoute\Facades\Route as AutoRoute;
use Illuminate\Support\Facades\Route;

AutoRoute::auto('', \App\Http\Controllers\Backend\HomeController::class, ['name' => 'home']);

AutoRoute::auto('information', \App\Http\Controllers\Backend\InformationController::class, [
    'name' => 'information',
    'middleware' => ['can:information:view'],
]);
AutoRoute::auto('boards', \App\Http\Controllers\Backend\BoardController::class, [
    'name' => 'boards',
    'middleware' => ['can:boards:view'],
]);
AutoRoute::auto('news', \App\Http\Controllers\Backend\NewsController::class, [
    'name' => 'news',
    'middleware' => ['can:news:view','can:category:view'],
]);
AutoRoute::auto('users', \App\Http\Controllers\Backend\UsersController::class, [
    'name' => 'users',
    'middleware' => ['can:users:view'],
]);
AutoRoute::auto('roles', \App\Http\Controllers\Backend\RolesController::class, [
    'name' => 'roles',
    'middleware' => ['can:roles:view'],
]);
AutoRoute::auto('settings', \App\Http\Controllers\Backend\SettingsController::class, [
    'name' => 'settings',
    'middleware' => ['can:settings:view'],
]);

Route::get('logout', [\App\Http\Controllers\Backend\Auth\LogoutController::class, 'index'])
    ->name('logout');

