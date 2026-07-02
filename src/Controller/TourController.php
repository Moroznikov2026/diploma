<?php

declare(strict_types=1);

namespace App\Controller;

final class TourController extends ResourceController
{
    protected string $table = 'tours';
    protected string $template = 'tour';
    protected string $redirectPath = '/tours';
    protected array $allowedFields = ['title', 'country', 'price'];
}
