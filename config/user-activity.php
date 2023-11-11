<?php

return [
    'activated'        => true,
    'middleware'       => ['web', 'auth'],
    'route_path'       => config('admin.prefix', 'admin') . '/user-activity',
    'admin_panel_path' => config('admin.prefix', 'admin') . '/',
    'delete_limit'     => 60,

    'model' => [
        'user' => "App\Models\User"
    ],

    'log_events' => [
        'on_create'     => true,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => false
    ]
];
