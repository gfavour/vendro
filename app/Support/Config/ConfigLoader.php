<?php

declare(strict_types=1);

namespace App\Support\Config;

use App\Exceptions\VendroException;

final class ConfigLoader
{
    /**
     * @param array<int, string> $paths
     * @return array<string, mixed>
     */
    public function load(array $paths): array
    {
        $config = [];

        foreach ($paths as $path) {
            if (!is_file($path)) {
                throw new VendroException("Configuration file not found: {$path}");
            }

            $key = basename($path, '.php');
            $data = require $path;

            if (!is_array($data)) {
                throw new VendroException("Configuration file {$path} must return an array.");
            }

            $config[$key] = $data;
        }

        return $config;
    }
}
