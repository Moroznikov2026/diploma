<?php

declare(strict_types=1);

namespace App\Service;

final class TaskService
{
    public function __construct(private readonly BitrixApiClient $bitrix = new BitrixApiClient()) {}

    public function create(string $title, int $responsibleId, string $description): array
    {
        return $this->bitrix->call('tasks.task.add', ['fields' => ['TITLE' => $title, 'RESPONSIBLE_ID' => $responsibleId, 'DESCRIPTION' => $description]]);
    }
}
