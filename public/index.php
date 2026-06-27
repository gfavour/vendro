<?php

declare(strict_types=1);

$bootstrap = require __DIR__ . '/../bootstrap/app.php';

$routeFile = __DIR__ . '/../routes/web.php';
if (is_file($routeFile)) {
    require $routeFile;
    return;
}

http_response_code(200);
header('Content-Type: text/plain; charset=utf-8');
echo 'Vendro bootstrap initialized with ' . count($bootstrap['config']) . ' config files.';
