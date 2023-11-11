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
    function services(string $name)
    {
        return match ($name) {
          'auth' => new \App\Services\AuthService()
        };
    }
}

if (!function_exists('repositories'))
{
    function repositories(string $name)
    {
        return match ($name) {
          'board' => new \App\Repositories\BoardRepository(),
          'boardMembers' => new \App\Repositories\BoardMemberRepository()
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

if (!function_exists('menus'))
{
    function menus(string $menu = 'sidebar')
    {
        return match ($menu) {
            'sidebar' => new \App\Menus\SidebarMenu()
        };
    }
}

