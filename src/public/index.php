<?php

declare(strict_types=1);

use App\PaymentGateway\Paddle\Transaction;

require __DIR__ . '/../vendor/autoload.php';

$transaction = new Transaction(100);

/*
$reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');
$reflectionProperty->setAccessible(true);
$reflectionProperty->setValue($transaction, 150);
var_dump($reflectionProperty->getValue($transaction));
*/

$transaction->copyFrom(new Transaction(100));
$transaction->process();
