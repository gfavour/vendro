<?php

declare(strict_types=1);

return [
    'signature_header' => env('WEBHOOK_SIGNATURE_HEADER', 'X-Vendro-Signature'),
    'timestamp_header' => env('WEBHOOK_TIMESTAMP_HEADER', 'X-Vendro-Timestamp'),
    'max_skew_seconds' => env_int('WEBHOOK_MAX_SKEW_SECONDS', 300),
    'retry_attempts' => env_int('WEBHOOK_RETRY_ATTEMPTS', 10),
];
