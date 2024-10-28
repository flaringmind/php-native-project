<?php

use App\App;
use App\Container;
use App\Controllers\GeneratorExampleController;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router;
use App\Config;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

    $container = new Container();
    $router = new Router($container);

    $router->registerRoutesFromControllerAttributes(
        [
            HomeController::class,
            InvoiceController::class,
            GeneratorExampleController::class,
        ]
    );
    echo '<pre>';
        print_r($router->getRoutes());
    echo '</pre>';


//        ->get('/', [HomeController::class, 'index'])
//        ->get('/invoices', [InvoiceController::class, 'index'])
//        ->get('/invoices/create', [InvoiceController::class, 'create'])
//        ->post('/invoices/create', [InvoiceController::class, 'store'])
//        ->get('/examples/generator', [GeneratorExampleController::class, 'index'])
//
//        ->get('/upload', [HomeController::class, 'renderUpload'])
//        ->post('/upload', [HomeController::class, 'upload'])
//        ->get('/transactions', [HomeController::class, 'transactions']);

(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();

