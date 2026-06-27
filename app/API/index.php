<?php

declare(strict_types=1);

$bootstrap = require __DIR__ . '/../../bootstrap/app.php';

http_response_code(200);
header('Content-Type: application/json');

echo json_encode([
    'success' => true,
    'status' => 'SUCCESS',
    'code' => 200,
    'message' => 'API bootstrap ready',
    'reference' => null,
    'data' => [
        'module' => 'api',
        'loaded_configs' => array_keys($bootstrap['config']),
    ],
], JSON_UNESCAPED_SLASHES);
