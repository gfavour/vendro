<?php

declare(strict_types=1);

return [
    'name' => env('APP_NAME', 'Vendro'),
    'env' => env('APP_ENV', 'production'),
    'debug' => env_bool('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'Africa/Lagos'),
    'locale' => env('APP_LOCALE', 'en'),
    'allowed_envs' => ['local', 'development', 'staging', 'production', 'testing'],
];
