<?php

declare(strict_types=1);

namespace App\Support\Config;

use App\Exceptions\VendroException;

final class ConfigRepository
{
    /**
     * @var array<string, mixed>
     */
    private array $items = [];

    private static ?self $instance = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param array<string, mixed> $items
     */
    public function setAll(array $items): void
    {
        if ($this->items !== []) {
            throw new VendroException('Configuration repository is already initialized and immutable.');
        }

        $this->items = $items;
    }

    /**
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->items;
    }

    public function has(string $key): bool
    {
        $segments = explode('.', $key);
        $value = $this->items;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return false;
            }

            $value = $value[$segment];
        }

        return true;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $segments = explode('.', $key);
        $value = $this->items;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }

            $value = $value[$segment];
        }

        return $value;
    }
}
