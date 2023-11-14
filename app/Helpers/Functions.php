<?php

if (!function_exists('assets')) {
    function assets(): \App\Helpers\Assets
    {
        return new \App\Helpers\Assets();
    }
}

if (!function_exists('services')) {
    function services(string $name)
    {
        return match ($name) {
            'auth' => new \App\Services\Admin\AuthService(),
            'board' => new \App\Services\Admin\BoardService(),
            'sponsor' => new \App\Services\Admin\SponsorService(),
        };
    }
}

if (!function_exists('cases')) {
    function cases(string $name)
    {
        return match ($name) {
            'status' => \App\Enums\StatusEnum::cases(),
            'grid' => \App\Enums\GridEnum::cases(),
            'locale' => \App\Enums\LocaleEnum::cases(),
        };
    }
}

if (!function_exists('repositories')) {
    function repositories(string $name)
    {
        return match ($name) {
            'board' => new \App\Repositories\Admin\Board\BoardRepository(),
            'boardMembers' => new \App\Repositories\Admin\Board\BoardMemberRepository(),
            'sponsor' => new \App\Repositories\Admin\Sponsor\SponsorRepository(),
            'post' => new \App\Repositories\Admin\Post\PostRepository(),
        };
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return auth()->user();
    }
}

if (!function_exists('menus')) {
    function menus(string $menu = 'sidebar')
    {
        return match ($menu) {
            'sidebar' => new \App\Menus\SidebarMenu()
        };
    }
}

