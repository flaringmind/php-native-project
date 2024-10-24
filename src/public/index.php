<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

try {
    $router = new \App\Router();

    $router
        ->get('/', [\App\Controllers\HomeController::class, 'index'])
        ->get('/invoices', [\App\Controllers\InvoiceController::class, 'index'])
        ->get('/download', [\App\Controllers\HomeController::class, 'download'])
        ->get('/invoices/create', [\App\Controllers\InvoiceController::class, 'create'])
        ->post('/invoices/create', [\App\Controllers\InvoiceController::class, 'store'])
        ->post('/upload', [\App\Controllers\HomeController::class, 'upload']);

    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );
} catch (\App\Exceptions\RouteNotFoundException $e) {
    //header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    http_response_code(404);
    echo \App\View::make('error/404');
}



