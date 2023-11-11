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
                'route' => 'admin.boards', // route name
                'title' => 'menu.sidebar.boards', // lang key
            ],
            [
                'name' => 'boards_members',
                'icon' => 'fa fa-users',
                'route' => 'admin.boards.members', // route name
                'title' => 'menu.sidebar.board_members', // lang key
            ]
        ];
    }

    protected function init(): void
    {
        self::$menus = collect([
            100 => [
                'name' => 'posts',
                'icon' => 'fa fa-newspaper',
                'route' => 'admin.posts', // route name
                'title' => 'menu.sidebar.posts', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => $this->postsChilds()
            ],

            110 => [
                'name' => 'boards',
                'icon' => 'fa fa-th-large',
                'route' => 'admin.boards', // route name
                'title' => 'menu.sidebar.boards', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => $this->boardsChilds()
            ],

            120 => [
                'name' => 'sponsors',
                'icon' => 'fa fa-leaf',
                'route' => 'admin.sponsors', // route name
                'title' => 'menu.sidebar.sponsors', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => []
            ],

            150 => [
                'name' => 'activity',
                'icon' => 'fa fa-chart-bar',
                'route' => 'admin.activity', // route name
                'title' => 'menu.sidebar.activity', // lang key
                'role' => 'admin', // role slug (,)
                'childs' => []
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
