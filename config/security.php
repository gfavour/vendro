<?php

declare(strict_types=1);

return [
    'jwt_secret' => env('JWT_SECRET', ''),
    'jwt_ttl_minutes' => env_int('JWT_TTL_MINUTES', 60),
    'refresh_ttl_days' => env_int('REFRESH_TTL_DAYS', 30),
    'rate_limit_per_minute' => env_int('RATE_LIMIT_PER_MINUTE', 60),
    'api_signature_required' => env_bool('API_SIGNATURE_REQUIRED', true),
    'ip_whitelist_enabled' => env_bool('IP_WHITELIST_ENABLED', false),
];
