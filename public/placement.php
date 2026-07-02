<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
App\Config\Container::boot(dirname(__DIR__));

?><!doctype html>
<html lang="ru"><head><meta charset="utf-8"><title>Travel App</title></head>
<body><script src="https://api.bitrix24.com/api/v1/"></script><script>BX24.init(() => location.href = '/');</script></body></html>
