<?php

declare(strict_types=1);

return [
    'driver' => env('QUEUE_DRIVER', 'redis'),
    'redis' => [
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'port' => (int) env('REDIS_PORT', '6379'),
        'password' => env('REDIS_PASSWORD', null),
        'database' => (int) env('REDIS_QUEUE_DB', '1'),
    ],
    'retry_schedule_minutes' => [1, 2, 5, 10, 20, 30, 60, 120, 360, 1440],
];
