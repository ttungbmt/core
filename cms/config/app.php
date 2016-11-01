<?php

return [
    'app' => [
        'timezone'        => 'Asia/Ho_Chi_Minh',
        'locale'          => 'vi',
        'fallback_locale' => 'en',
    ],

    'mail' => [
        'driver' => env('MAIL_DRIVER', 'smtp'),
        'host' => env('MAIL_HOST', 'mailtrap.io'),
        'port' => env('MAIL_PORT', 2525),
        'from' => [
            'address' => 'lara@mail.com',
            'name' => 'Trương Thanh Tùng',
        ],
        'encryption' => env('MAIL_ENCRYPTION', 'tls'),
        'username' => env('MAIL_USERNAME', 'e2404777e06f4d'),
        'password' => env('MAIL_PASSWORD', '88526433d3a1f2'),
    ],

    'auth' => [
        'providers' => [
            'users' => [
                'driver' => 'eloquent',
                'model' => \Lara\Auth\App\Models\User::class,
            ],
        ],
    ],


//    'database' => [
//        'connections' => [
//            'hcm_map' => [
//                'driver' => 'pgsql',
//                'host' => 'localhost',
//                'port' => '5432',
//                'database' => 'hcm_map',
//                'username' => 'postgres',
//                'password' => 'postgres',
//                'charset' => 'utf8',
//                'prefix' => '',
//                'schema' => 'public',
//            ],
//        ]
//    ],
//
//    'auth' => [
//        'providers' => [
//            'users' => [
//                'driver' => 'eloquent',
//                'model' => \Lara\Auth\App\Models\User::class,
//            ],
//        ],
//    ],

//    'settings' => [
//        'path' => base_path('core/settings.json'),
//    ],

//    'filesystems' => [
//        'default' => 'uploads',
//        'disks' => [
//            'themes' => [
//                'driver' => 'local',
//                'root' => public_path('themes'),
//            ],
//            'scss' => [
//                'driver' => 'local',
//                'root' => public_path('app/assets/scss'),
//            ],
//            'less' => [
//                'driver' => 'local',
//                'root' => public_path('themes/cms/assets/less'),
//            ],
//            'uploads' => [
//                'driver' => 'local',
//                'root' => public_path('uploads'),
//            ],
//        ],
//    ],
//
//    'recaptcha' => [
//        'public_key'     => env('RECAPTCHA_PUBLIC_KEY', '6LcR4RMTAAAAANfrdOW_l0moyIFHN76dxnc8H-i5'),
//        'private_key'    => env('RECAPTCHA_PRIVATE_KEY', '6LcR4RMTAAAAAACFgaXpnhimrTCFoZf9UKt9UIro'),
//    ],

    'debugbar' => [
        'enabled' => null,

        'collectors' => [
            'laravel'         => true,
            'auth'            => true,
            'gate'            => true,
            'events'          => true, // All events fired
            'logs'            => true, // Add the latest log messages
            'files'           => false, // Show the included files
        ],

        'options' => [
            'auth' => [
                'show_name' => false,   // Also show the users name/email in the debugbar
            ],
            'db' => [
                'with_params'       => true,   // Render SQL with the parameters substituted
                'timeline'          => false,  // Add the queries to the timeline
                'backtrace'         => true,  // EXPERIMENTAL: Use a backtrace to find the origin of the query in your files.
                'explain' => [                 // EXPERIMENTAL: Show EXPLAIN output on queries
                    'enabled' => false,
                    'types' => ['SELECT'],     // ['SELECT', 'INSERT', 'UPDATE', 'DELETE']; for MySQL 5.6.3+
                ],
                'hints'             => true,    // Show hints for common mistakes
            ],
            'views' => [
                'data' => false,    //Note: Can slow down the application, because the data can be quite large..
            ],
        ]
    ],
];