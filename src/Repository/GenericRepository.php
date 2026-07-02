<?php

declare(strict_types=1);

namespace App\Repository;

use App\Core\Repository;

final class GenericRepository extends Repository
{
    public function all(string $table): array
    {
        return $this->pdo->query('SELECT * FROM ' . $table . ' ORDER BY id DESC LIMIT 100')->fetchAll();
    }

    public function create(string $table, array $data): void
    {
        $columns = array_keys($data);
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(',', $columns), ':' . implode(',:', $columns));
        $this->pdo->prepare($sql)->execute($data);
    }
}
