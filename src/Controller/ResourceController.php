<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;
use App\Repository\GenericRepository;
use PDO;
use Throwable;

abstract class ResourceController extends Controller
{
    protected string $table;
    protected string $template;
    protected string $redirectPath;
    protected array $allowedFields = [];

    public function index(array $request = []): string
    {
        $items = [];
        try {
            $items = (new GenericRepository($this->container->get(PDO::class)))->all($this->table);
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
        }

        return $this->view($this->template, [
            'title' => $this->template,
            'items' => $items,
        ]);
    }

    public function store(array $request): string
    {
        $payload = array_intersect_key($request, array_flip($this->allowedFields));
        if ($payload !== []) {
            (new GenericRepository($this->container->get(PDO::class)))->create($this->table, $payload);
        }

        return $this->redirect($this->redirectPath);
    }
}
