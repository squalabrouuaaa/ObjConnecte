<?php

return [

   'default' => 'accounts',

   'connections' => [
        'mysql' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'port'      => env('DB_PORT', 3306),
            'database'  => env('DB_DATABASE', 'mr_bot_user_dashbot'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => env('DB_CHARSET', 'utf8'),
            'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
            //'prefix'    => env('DB_PREFIX', ''),
            //'timezone'  => env('DB_TIMEZONE', '+00:00'),
            //'strict'    => env('DB_STRICT_MODE', false),
         ],

        'mysql2' => [
            'driver'    => 'mysql',
            'host'      => env('DB2_HOST', 'localhost'),
            'port'      => env('DB2_PORT',3306),
            'database'  => env('DB2_DATABASE','mr_bot_webchat'),
            'username'  => env('DB2_USERNAME', 'root'),
            'password'  => env('DB2_PASSWORD', ''),
            'charset'   => env('DB2_CHARSET', 'utf8'),
            'collation' => env('DB2_COLLATION', 'utf8_unicode_ci'),
            //'prefix'    => '',
            //'strict'    => false,
        ],
    ],
];