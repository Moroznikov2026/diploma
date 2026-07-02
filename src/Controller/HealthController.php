<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;

final class HealthController extends Controller
{
    public function index(array $request = []): string
    {
        return $this->view('health', ['title' => 'Health']);
    }
}
