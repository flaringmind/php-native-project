<?php

declare(strict_types=1);

/*
require_once '../app/PaymentGateway/Stripe/Transaction.php';
require_once '../app/PaymentGateway/Paddle/Transaction.php';
require_once '../app/PaymentGateway/Paddle/CustomerProfile.php';
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/../' . lcfirst(str_replace('\\', '/', $class)) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});
*/


require __DIR__ . '/../vendor/autoload.php';

use App\PaymentGateway\Paddle\Transaction;

$uid = new \Ramsey\Uuid\UuidFactory();

echo $uid->uuid4();

$paddleTransaction = new Transaction();
var_dump($paddleTransaction);
