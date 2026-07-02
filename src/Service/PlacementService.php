<?php

declare(strict_types=1);

namespace App\Service;

final class PlacementService
{
    public function __construct(private readonly BitrixApiClient $bitrix = new BitrixApiClient()) {}

    public function bindLeftMenu(string $handlerUrl, string $title = 'FEON CRM'): array
    {
        return $this->bitrix->call('placement.bind', [
            'PLACEMENT' => 'LEFT_MENU',
            'HANDLER' => $handlerUrl,
            'TITLE' => $title,
        ]);
    }

    public function unbindLeftMenu(string $handlerUrl): array
    {
        return $this->bitrix->call('placement.unbind', [
            'PLACEMENT' => 'LEFT_MENU',
            'HANDLER' => $handlerUrl,
        ]);
    }
}
