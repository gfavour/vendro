<?php

declare(strict_types=1);

return [
    'default_gateway' => env('PAYMENT_GATEWAY', 'wallet'),
    'wallet' => [
        'enabled' => true,
    ],
    'bank_transfer' => [
        'enabled' => true,
    ],
    'virtual_accounts' => [
        'enabled' => true,
    ],
];
