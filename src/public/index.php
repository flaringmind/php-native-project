<?php

use App\App;

use App\Config;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Twig\Extra\Intl\IntlExtension;

require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$container = new Container();

$container->set(Config::class, DI\create(Config::class)->constructor($_ENV));

$config = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/../app/Entity']);
$conn = DriverManager::getConnection((new Config($_ENV))->db, $config);
$container->set(
    EntityManager::class,
    fn() => new EntityManager($conn, $config)
);

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->get('/', [HomeController::class, 'index']);
$app->get('/invoices', [InvoiceController::class, 'index']);

// Create Twig
$twig = Twig::create(VIEW_PATH, [
        'cache' => STORAGE_PATH . '/cache',
        'auto_reload' => true
]);

$twig->addExtension(new IntlExtension());

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));

$app->run();

