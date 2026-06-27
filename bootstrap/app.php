<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Helpers/functions.php';
require_once __DIR__ . '/env.php';

use App\Support\Config\ConfigLoader;
use App\Support\Config\ConfigRepository;
use App\Support\Config\ConfigValidator;
use App\Support\Config\EnvValidator;

$envValidator = new EnvValidator();
$envValidator->validate();

$registry = require __DIR__ . '/config.php';
$loader = new ConfigLoader();
$config = $loader->load($registry['paths']);

$configValidator = new ConfigValidator();
$configValidator->validate($config);

$repository = ConfigRepository::instance();
$repository->setAll($config);

return [
    'config' => $config,
];
