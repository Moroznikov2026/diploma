<?php

declare(strict_types=1);

namespace App\Controller;

final class CommunicationController extends ResourceController
{
    protected string $table = 'communications';
    protected string $template = 'communication';
    protected string $redirectPath = '/communications';
    protected array $allowedFields = ['client_id', 'channel', 'message'];
}
