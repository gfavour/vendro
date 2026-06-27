<?php

declare(strict_types=1);

namespace App\Contracts;

interface ResponseFormatterInterface
{
    public function success(string $message, array $data = [], int $code = 200, ?string $reference = null): array;

    public function error(string $message, int $code = 400, array $errors = []): array;
}
