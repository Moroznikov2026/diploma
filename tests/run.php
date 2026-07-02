<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$required = [
    App\Core\Router::class,
    App\Controller\ResourceController::class,
    App\Service\BitrixApiClient::class,
    App\Service\NotificationService::class,
    App\Service\TaskService::class,
    App\Service\PlacementService::class,
];
foreach ($required as $class) {
    if (!class_exists($class)) {
        fwrite(STDERR, "Missing class: {$class}\n");
        exit(1);
    }
}
echo "Smoke tests passed\n";
