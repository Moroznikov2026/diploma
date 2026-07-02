<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

App\Config\Container::boot(dirname(__DIR__));
$auth = new App\Service\BitrixAuthService(new App\Service\TokenStorageService());
$auth->handleInstall($_REQUEST);

header('Location: /?installed=1');
