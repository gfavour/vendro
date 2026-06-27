<?php

declare(strict_types=1);

namespace App\Support\Config;

use App\Exceptions\VendroException;

final class ConfigValidator
{
    /**
     * @var array<int, string>
     */
    private array $requiredConfigKeys = [
        'app.name',
        'app.env',
        'app.debug',
        'database.default',
        'database.connections.mysql.host',
        'database.connections.mysql.port',
        'database.connections.mysql.database',
        'database.connections.mysql.username',
        'queue.driver',
        'security.jwt_secret',
        'security.jwt_ttl_minutes',
        'security.refresh_ttl_days',
    ];

    /**
     * @var array<int, string>
     */
    private array $allowedEnvironments = [
        'local',
        'development',
        'staging',
        'production',
        'testing',
    ];

    /**
     * @param array<string, mixed> $config
     */
    public function validate(array $config): void
    {
        $this->validateRequiredKeys($config);
        $this->validateEnvironment($config);
        $this->validateSecurity($config);
    }

    /**
     * @param array<string, mixed> $config
     */
    private function validateRequiredKeys(array $config): void
    {
        $repository = ConfigRepository::instance();
        $repository->setAll($config);

        $missing = [];

        foreach ($this->requiredConfigKeys as $key) {
            if (!$repository->has($key)) {
                $missing[] = $key;
            }
        }

        if ($missing !== []) {
            throw new VendroException('Missing required configuration keys: ' . implode(', ', $missing));
        }
    }

    /**
     * @param array<string, mixed> $config
     */
    private function validateEnvironment(array $config): void
    {
        $env = (string) ($config['app']['env'] ?? '');

        if (!in_array($env, $this->allowedEnvironments, true)) {
            throw new VendroException('APP_ENV must be one of: ' . implode(', ', $this->allowedEnvironments));
        }
    }

    /**
     * @param array<string, mixed> $config
     */
    private function validateSecurity(array $config): void
    {
        $env = (string) ($config['app']['env'] ?? 'local');
        $jwtSecret = (string) ($config['security']['jwt_secret'] ?? '');

        if ($jwtSecret === '') {
            throw new VendroException('JWT_SECRET is required and cannot be empty.');
        }

        if ($env !== 'local' && in_array($jwtSecret, ['change-me', 'secret', 'vendro', '123456'], true)) {
            throw new VendroException('JWT_SECRET is weak for non-local environment. Use a cryptographically secure secret.');
        }

        if (strlen($jwtSecret) < 16) {
            throw new VendroException('JWT_SECRET must be at least 16 characters long.');
        }
    }
}
