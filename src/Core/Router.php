<?php

declare(strict_types=1);

namespace App\Core;

use App\Config\Container;

final class Router
{
    private array $routes = [];

    public function __construct(private readonly Container $container) {}

    public function get(string $path, string $controller, string $method): void { $this->add('GET', $path, $controller, $method); }
    public function post(string $path, string $controller, string $method): void { $this->add('POST', $path, $controller, $method); }
    private function add(string $verb, string $path, string $controller, string $method): void { $this->routes[$verb][$path] = [$controller, $method]; }

    public function dispatch(string $verb, string $path): void
    {
        [$class, $method] = $this->routes[$verb][$path] ?? $this->routes['GET']['/'];
        echo (new $class($this->container))->$method($_REQUEST);
    }
}
