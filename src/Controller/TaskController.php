<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Service\TaskService;

final class TaskController extends Controller
{
    public function create(array $request): string
    {
        (new TaskService())->create((string) ($request['title'] ?? 'Заявка туриста'), (int) ($request['responsible_id'] ?? 1), (string) ($request['description'] ?? ''));
        return $this->redirect('/');
    }
}
