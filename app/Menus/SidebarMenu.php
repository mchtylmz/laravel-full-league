<?php

namespace App\Menus;

class SidebarMenu
{
    protected static object $menus;

    public function __construct()
    {
        $this->init();
    }

    public function role(string $role): object
    {
        $menus = self::$menus->filter(function (array $data, int $key) use ($role) {
            if (!is_array($data['role'])) {
                $data['role'] = explode(',', $data['role']);
            }
            return in_array($role, $data['role']);
        });

        return $this->toObject($menus);
    }

    public function all(): object
    {
        return $this->toObject(self::$menus);
    }

    public function postsChilds(): array
    {
        return [];
    }

    public function boardsChilds(): array
    {
        return [
            [
                'name' => 'boards',
                'icon' => 'fa fa-th-large',
                'route' => 'admin.boards.index', // route name
                'title' => 'menu.sidebar.boards', // lang key
            ],
            [
                'name' => 'boards_members',
                'icon' => 'fa fa-users',
                'route' => 'admin.boards.members.index', // route name
                'title' => 'menu.sidebar.board_members', // lang key
            ]
        ];
    }

    public function settingsChilds(): array
    {
        return [
            [
                'name' => 'post_types',
                'icon' => 'fa fa-news',
                'route' => 'admin.settings.activity', // route name
                'title' => 'menu.sidebar.post_types', // lang key
            ],
            [
                'name' => 'files',
                'icon' => 'fa fa-files',
                'route' => 'admin.settings.files', // route name
                'title' => 'menu.sidebar.files', // lang key
            ],
            [
                'name' => 'activity',
                'icon' => 'fa fa-th-bug',
                'route' => 'admin.settings.activity', // route name
                'title' => 'menu.sidebar.activity', // lang key
            ]
        ];
    }

    protected function init(): void
    {
        self::$menus = collect([
            80 => [
                'name' => 'leagues',
                'icon' => 'fa fa-futbol',
                'route' => 'admin.posts.index', // route name
                'title' => 'menu.sidebar.leagues', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => []
            ],
            90 => [
                'name' => 'seasons',
                'icon' => 'fa fa-futbol',
                'route' => 'admin.posts.index', // route name
                'title' => 'menu.sidebar.seasons', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => []
            ],
            100 => [
                'name' => 'posts',
                'icon' => 'fa fa-newspaper',
                'route' => 'admin.posts.index', // route name
                'title' => 'menu.sidebar.posts', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => $this->postsChilds()
            ],

            110 => [
                'name' => 'boards',
                'icon' => 'fa fa-th-large',
                'route' => 'admin.boards.index', // route name
                'title' => 'menu.sidebar.boards', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => $this->boardsChilds()
            ],

            120 => [
                'name' => 'sponsors',
                'icon' => 'fa fa-leaf',
                'route' => 'admin.sponsors.index', // route name
                'title' => 'menu.sidebar.sponsors', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => []
            ],

            200 => [
                'name' => 'settings',
                'icon' => 'fa fa-cog',
                'route' => 'admin', // route name
                'title' => 'menu.sidebar.settings', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => $this->settingsChilds()
            ],
        ]);
    }

    protected function toObject(mixed $data): object
    {
        return json_decode(
            json_encode($data)
        );
    }
}
