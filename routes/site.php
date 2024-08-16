<?php

use Illuminate\Support\Facades\Route;
use Buki\AutoRoute\Facades\Route as AutoRoute;

/*
AutoRoute::auto('/', \App\Http\Controllers\Site\HomeController::class, [
    'name' => 'home'
]);
*/

Route::get('/', function () {

    dump(
        auth()->check(),
        auth()->user()
    );

    foreach (['dashboard', 'home'] as $uri) {
        if (Route::has($uri)) {
            echo route($uri);
        }
    }

    $routes = Route::getRoutes()->get('GET');

    dump($routes);

    foreach (['dashboard', 'home'] as $uri) {
        if (isset($routes[$uri])) {
            echo '*2/'.$uri;
        }
    }

    echo '*1/';
});
