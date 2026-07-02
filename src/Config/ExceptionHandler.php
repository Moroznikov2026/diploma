<?php

declare(strict_types=1);

namespace App\Config;

use Throwable;

final class ExceptionHandler
{
    public static function render(Throwable $exception): void
    {
        http_response_code(500);
        error_log($exception->getMessage());
        $debug = filter_var(env('APP_DEBUG', false), FILTER_VALIDATE_BOOL);
        include dirname(__DIR__) . '/View/error.php';
    }
}
