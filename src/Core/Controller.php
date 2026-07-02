<?php

declare(strict_types=1);

namespace App\Core;

use App\Config\Container;

abstract class Controller
{
    public function __construct(protected readonly Container $container) {}

    protected function view(string $template, array $data = []): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        include dirname(__DIR__) . '/View/layout.php';
        return (string) ob_get_clean();
    }

    protected function redirect(string $path): string
    {
        header('Location: ' . $path);
        return '';
    }
}
