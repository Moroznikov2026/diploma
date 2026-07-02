<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Config;
use App\Service\PlacementService;

final class PlacementController extends Controller
{
    public function bindLeftMenu(array $request): string
    {
        $handler = (string) ($request['handler'] ?? rtrim((string) Config\env('APP_URL', ''), '/') . '/placement.php');
        (new PlacementService())->bindLeftMenu($handler, (string) ($request['title'] ?? 'FEON CRM'));
        return $this->redirect('/settings');
    }

    public function unbindLeftMenu(array $request): string
    {
        $handler = (string) ($request['handler'] ?? rtrim((string) Config\env('APP_URL', ''), '/') . '/placement.php');
        (new PlacementService())->unbindLeftMenu($handler);
        return $this->redirect('/settings');
    }
}
