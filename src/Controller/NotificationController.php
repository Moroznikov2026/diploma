<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Service\NotificationService;

final class NotificationController extends Controller
{
    public function send(array $request): string
    {
        (new NotificationService())->send((int) ($request['user_id'] ?? 1), (string) ($request['message'] ?? 'Новое уведомление'));
        return $this->redirect('/');
    }
}
