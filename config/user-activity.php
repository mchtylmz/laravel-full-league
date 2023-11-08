<?php

return [
    'activated'        => true,
    'middleware'       => ['web', 'auth'],
    'route_path'       => config('auth.prefix.admin', 'panel') . '/user-activity',
    'admin_panel_path' => config('auth.prefix.admin', 'panel') . '/dashboard',
    'delete_limit'     => 30,

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
