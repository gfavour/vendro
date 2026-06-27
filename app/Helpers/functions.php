<?php

declare(strict_types=1);

use App\Exceptions\VendroException;
use App\Support\Config\ConfigRepository;

if (!function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        $base = dirname(__DIR__, 2);
        return $path === '' ? $base : $base . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }
}

if (!function_exists('env')) {
    function env(string $key, ?string $default = null): ?string
    {
        $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        if ($value === false || $value === null) {
            return $default;
        }
        return (string) $value;
    }
}

if (!function_exists('env_int')) {
    function env_int(string $key, int $default): int
    {
        $value = env($key, (string) $default);
        if ($value === null || !preg_match('/^-?\d+$/', $value)) {
            throw new VendroException("Environment variable {$key} must be a valid integer.");
        }

        return (int) $value;
    }
}

if (!function_exists('env_bool')) {
    function env_bool(string $key, bool $default): bool
    {
        $value = env($key, $default ? 'true' : 'false');
        $normalized = strtolower((string) $value);

        return match ($normalized) {
            '1', 'true', 'yes', 'on' => true,
            '0', 'false', 'no', 'off' => false,
            default => throw new VendroException("Environment variable {$key} must be a valid boolean."),
        };
    }
}

if (!function_exists('config')) {
    function config(?string $key = null, mixed $default = null): mixed
    {
        $repository = ConfigRepository::instance();

        if ($key === null) {
            return $repository->all();
        }

        return $repository->get($key, $default);
    }
}
