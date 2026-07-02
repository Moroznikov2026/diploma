<?php

declare(strict_types=1);

namespace App\Controller;

use App\Core\Controller;

final class ReportController extends Controller
{
    public function index(array $request = []): string
    {
        return $this->view('report', ['title' => 'Отчёты']);
    }
}
