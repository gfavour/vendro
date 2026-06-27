<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ResponseFormatterInterface;

final class ResponseFormatterService implements ResponseFormatterInterface
{
    public function success(string $message, array $data = [], int $code = 200, ?string $reference = null): array
    {
        return [
            'success' => true,
            'status' => 'SUCCESS',
            'code' => $code,
            'message' => $message,
            'reference' => $reference,
            'data' => $data,
        ];
    }

    public function error(string $message, int $code = 400, array $errors = []): array
    {
        return [
            'success' => false,
            'status' => 'FAILED',
            'code' => $code,
            'message' => $message,
            'errors' => $errors,
        ];
    }
}
