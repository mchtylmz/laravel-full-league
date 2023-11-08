<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    assets();
    return view('welcome');
});

