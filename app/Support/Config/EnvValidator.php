<?php

declare(strict_types=1);

namespace App\Support\Config;

use App\Exceptions\VendroException;

final class EnvValidator
{
    /**
     * @var array<int, string>
     */
    private array $requiredEnvKeys = [
        'APP_NAME',
        'APP_ENV',
        'APP_DEBUG',
        'APP_URL',
        'DB_CONNECTION',
        'DB_HOST',
        'DB_PORT',
        'DB_DATABASE',
        'DB_USERNAME',
        'QUEUE_DRIVER',
        'JWT_SECRET',
        'JWT_TTL_MINUTES',
        'REFRESH_TTL_DAYS',
    ];

    public function validate(): void
    {
        $missing = [];

        foreach ($this->requiredEnvKeys as $key) {
            $value = env($key);

            if ($value === null || trim($value) === '') {
                $missing[] = $key;
            }
        }

        if ($missing !== []) {
            throw new VendroException('Missing required environment variables: ' . implode(', ', $missing));
        }

        env_int('DB_PORT', 3306);
        env_int('JWT_TTL_MINUTES', 60);
        env_int('REFRESH_TTL_DAYS', 30);
        env_bool('APP_DEBUG', false);
    }
}
