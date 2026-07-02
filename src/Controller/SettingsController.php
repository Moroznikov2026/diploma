<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;

final class SettingsController extends Controller
{
    public function index(array $request = []): string
    {
        return $this->view('settings', ['title' => 'Настройки']);
    }

    public function save(array $request): string
    {
        file_put_contents(dirname(__DIR__, 2) . '/storage/settings.json', json_encode($request, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return $this->redirect('/settings');
    }
}
