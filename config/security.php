<?php

declare(strict_types=1);

return [
    'jwt_secret' => env('JWT_SECRET', ''),
    'jwt_ttl_minutes' => (int) env('JWT_TTL_MINUTES', '60'),
    'refresh_ttl_days' => (int) env('REFRESH_TTL_DAYS', '30'),
    'rate_limit_per_minute' => (int) env('RATE_LIMIT_PER_MINUTE', '60'),
    'api_signature_required' => filter_var(env('API_SIGNATURE_REQUIRED', 'true'), FILTER_VALIDATE_BOOL),
    'ip_whitelist_enabled' => filter_var(env('IP_WHITELIST_ENABLED', 'false'), FILTER_VALIDATE_BOOL),
];
