<?php

declare(strict_types=1);

header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'status' => 'SUCCESS',
    'code' => 200,
    'message' => 'Vendro API Routes Placeholder',
    'reference' => null,
    'data' => [],
], JSON_UNESCAPED_SLASHES);
