<?php

declare(strict_types=1);

use App\Config\Container;
use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$container = Container::boot(dirname(__DIR__));
$router = new Router($container);

$router->get('/', App\Controller\DashboardController::class, 'index');
$router->get('/clients', App\Controller\ClientController::class, 'index');
$router->post('/clients/store', App\Controller\ClientController::class, 'store');
$router->get('/requests', App\Controller\TravelRequestController::class, 'index');
$router->post('/requests/store', App\Controller\TravelRequestController::class, 'store');
$router->get('/tours', App\Controller\TourController::class, 'index');
$router->post('/tours/store', App\Controller\TourController::class, 'store');
$router->get('/communications', App\Controller\CommunicationController::class, 'index');
$router->post('/communications/store', App\Controller\CommunicationController::class, 'store');
$router->get('/reports', App\Controller\ReportController::class, 'index');
$router->post('/notifications/send', App\Controller\NotificationController::class, 'send');
$router->post('/tasks/create', App\Controller\TaskController::class, 'create');
$router->post('/placements/left-menu/bind', App\Controller\PlacementController::class, 'bindLeftMenu');
$router->post('/placements/left-menu/unbind', App\Controller\PlacementController::class, 'unbindLeftMenu');
$router->get('/settings', App\Controller\SettingsController::class, 'index');
$router->post('/settings/save', App\Controller\SettingsController::class, 'save');
$router->get('/health', App\Controller\HealthController::class, 'index');

$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');
