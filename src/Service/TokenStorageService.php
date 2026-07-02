<?php

declare(strict_types=1);

namespace App\Service;

final class TokenStorageService
{
    private string $file;

    public function __construct(?string $file = null)
    {
        $this->file = $file ?? dirname(__DIR__, 2) . '/storage/tokens.json';
    }

    public function save(array $token): void
    {
        file_put_contents($this->file, json_encode($token, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function getCurrent(): ?array
    {
        return is_file($this->file) ? json_decode((string) file_get_contents($this->file), true) : null;
    }
}
