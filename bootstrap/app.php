<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Helpers/functions.php';
require_once __DIR__ . '/env.php';

$config = [];
$registry = require __DIR__ . '/config.php';

foreach ($registry['paths'] as $path) {
    $config[basename($path, '.php')] = require $path;
}

return [
    'config' => $config,
];
