<?php

declare(strict_types=1);

namespace App\Service;

final class NotificationService
{
    public function __construct(private readonly BitrixApiClient $bitrix = new BitrixApiClient()) {}

    public function send(int $userId, string $message): array
    {
        return $this->bitrix->call('im.notify.system.add', ['USER_ID' => $userId, 'MESSAGE' => $message]);
    }
}
