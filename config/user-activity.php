<?php

return [
    'activated'        => true, // active/inactive all logging
    'middleware'       => ['web', 'auth'],
    'route_path'       => env('APP_ADMIN_PREFIX') . '/activity-user',
    'admin_panel_path' => env('APP_ADMIN_PREFIX') . '/activity-dashboard',
    'delete_limit'     => 90, // default 7 days

    'model' => [
        'user' => \App\Models\User::class
    ],

    'log_events' => [
        'on_create'     => true,
        'on_edit'       => true,
        'on_delete'     => true,
        'on_login'      => true,
        'on_lockout'    => true
    ]
];
