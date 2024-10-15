<?php

declare(strict_types=1);

use App\PaymentGateway\Paddle\Transaction;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction(100, 'Transaction1');
$transaction = new Transaction(100, 'Transaction1');
$transaction = new Transaction(100, 'Transaction1');
$transaction = new Transaction(100, 'Transaction1');


$transaction->process();
