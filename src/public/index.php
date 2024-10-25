<?php

use App\App;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router;
use App\Config;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

    $router = new Router();

    $router
        ->get('/', [HomeController::class, 'index'])
        ->get('/invoices', [InvoiceController::class, 'index'])
        ->get('/download', [HomeController::class, 'download'])
        ->get('/invoices/create', [InvoiceController::class, 'create'])
        ->post('/invoices/create', [InvoiceController::class, 'store'])
        ->post('/upload', [HomeController::class, 'upload']);

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();

