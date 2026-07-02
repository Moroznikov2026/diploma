<?php

declare(strict_types=1);

namespace App\Controller;

final class ClientController extends ResourceController
{
    protected string $table = 'clients';
    protected string $template = 'client';
    protected string $redirectPath = '/clients';
    protected array $allowedFields = ['name', 'phone', 'email'];
}
