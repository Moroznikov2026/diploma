<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Service\BitrixApiClient;

final class DashboardController extends Controller
{
    public function index(array $request = []): string
    {
        return $this->view('dashboard', [
            'title' => 'Dashboard',
            'bitrixProfile' => (new BitrixApiClient())->call('profile'),
        ]);
    }
}
