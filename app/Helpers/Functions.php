<?php

if (!function_exists('assets'))
{
    function assets(): \App\Helpers\Assets
    {
        return new \App\Helpers\Assets();
    }
}

if (!function_exists('services'))
{
    function services($name)
    {
        return match ($name) {
          'auth' => new \App\Services\AuthService()
        };
    }
}


if (!function_exists('admin'))
{
    function admin()
    {
        return auth()->user();
    }
}

