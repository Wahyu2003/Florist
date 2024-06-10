<?php
return [

    'defaults' => [
        'guard' => 'admin', // Mengatur guard default ke 'admin'
        'passwords' => 'admins', // Mengubah 'users' menjadi 'admins' sesuai dengan guard yang digunakan
    ],

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],
    
    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'admins' => [ // Mengubah 'users' menjadi 'admins'
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];