<?php

declare(strict_types=1);

namespace App\Service;

final class BitrixApiClient
{
    public function __construct(private readonly TokenStorageService $tokens = new TokenStorageService()) {}

    public function call(string $method, array $params = []): array
    {
        $token = $this->tokens->getCurrent();
        if (!$token) { return ['result' => null, 'error' => 'NO_TOKEN']; }
        $url = rtrim($token['client_endpoint'], '/') . '/' . $method . '.json';
        $payload = http_build_query(array_merge($params, ['auth' => $token['access_token']]));
        $context = stream_context_create(['http' => ['method' => 'POST', 'header' => "Content-Type: application/x-www-form-urlencoded\r\n", 'content' => $payload, 'timeout' => 10]]);
        $response = file_get_contents($url, false, $context);
        return json_decode((string) $response, true) ?: [];
    }
}
