<?php

declare(strict_types=1);

return [
    'default' => env('CACHE_DRIVER', 'redis'),
    'prefix' => env('CACHE_PREFIX', 'vendro_cache_'),
    'redis' => [
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'port' => (int) env('REDIS_PORT', '6379'),
        'password' => env('REDIS_PASSWORD', null),
        'database' => (int) env('REDIS_CACHE_DB', '0'),
    ],
];
