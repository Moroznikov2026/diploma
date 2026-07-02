<?php

declare(strict_types=1);

namespace App\Service;

final class BitrixAuthService
{
    public function __construct(private readonly TokenStorageService $storage) {}

    public function handleInstall(array $request): void
    {
        if (!isset($request['AUTH_ID'], $request['DOMAIN'])) {
            return;
        }
        $this->storage->save([
            'domain' => $request['DOMAIN'],
            'access_token' => $request['AUTH_ID'],
            'refresh_token' => $request['REFRESH_ID'] ?? '',
            'client_endpoint' => $request['client_endpoint'] ?? ('https://' . $request['DOMAIN'] . '/rest/'),
            'member_id' => $request['member_id'] ?? '',
        ]);
    }
}
