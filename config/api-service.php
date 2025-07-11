<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Discovery
    |--------------------------------------------------------------------------
    |
    | This is the core of the auto-registration of your API services.
    | It will scan the given namespace and path for your API service
    | classes and register them automatically.
    |
    */
    'discovery' => [
        'namespace' => 'App\\Filament',
        'path' => app_path('Filament/'),
    ],

    'navigation' => [
        'token' => [
            'cluster' => null,
            'group' => 'User',
            'sort' => -1,
            'icon' => 'heroicon-o-key',
            'should_register_navigation' => false,
        ],
    ],
    'models' => [
        'token' => [
            'enable_policy' => true,
        ],
    ],
    'route' => [
        'panel_prefix' => true,
        'use_resource_middlewares' => false,
    ],
    'tenancy' => [
        'enabled' => false,
        'awareness' => false,
    ],
    'login-rules' => [
        'email' => 'required|email',
        'password' => 'required',
    ],
    'use-spatie-permission-middleware' => true,
];
