<?php

declare(strict_types=1);

namespace App\Core;

use PDO;

abstract class Repository
{
    public function __construct(protected readonly PDO $pdo) {}
}
