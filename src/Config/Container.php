<?php

declare(strict_types=1);

namespace App\Config;

use PDO;

final class Container
{
    private static array $services = [];

    public static function boot(string $root): self
    {
        if (class_exists('Dotenv\\Dotenv') && file_exists($root . '/.env')) {
            \Dotenv\Dotenv::createImmutable($root)->safeLoad();
        } elseif (file_exists($root . '/.env')) {
            foreach (file($root . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
                if (!str_contains($line, '=') || str_starts_with(trim($line), '#')) { continue; }
                [$key, $value] = explode('=', $line, 2); $_ENV[trim($key)] = trim($value);
            }
        }
        self::$services['root'] = $root;
        self::$services[PDO::class] = fn() => new PDO(
            sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4', env('DB_HOST', '127.0.0.1'), env('DB_PORT', '3306'), env('DB_DATABASE', 'bitrix24_travel')),
            env('DB_USERNAME', 'root'), env('DB_PASSWORD', ''),
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
        set_exception_handler([ExceptionHandler::class, 'render']);
        return new self();
    }

    public function get(string $id): mixed
    {
        if (!isset(self::$services[$id])) { return new $id(); }
        if (is_callable(self::$services[$id])) { self::$services[$id] = self::$services[$id](); }
        return self::$services[$id];
    }
}

function env(string $key, mixed $default = null): mixed
{
    return $_ENV[$key] ?? getenv($key) ?: $default;
}
