<?php

declare(strict_types=1);

namespace App\Controller;

final class TravelRequestController extends ResourceController
{
    protected string $table = 'travel_requests';
    protected string $template = 'travelrequest';
    protected string $redirectPath = '/requests';
    protected array $allowedFields = ['client_id', 'destination', 'budget', 'status'];
}
