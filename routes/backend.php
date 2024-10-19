<?php

use Buki\AutoRoute\Facades\Route as AutoRoute;
use Illuminate\Support\Facades\Route;

AutoRoute::auto('', \App\Http\Controllers\Backend\HomeController::class, ['name' => 'home']);

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

