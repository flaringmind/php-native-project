<?php

declare(strict_types=1);

require_once '../PaymentProfile.php';
require_once '../Customer.php';
require_once '../Transaction.php';


$transaction = (new Transaction(100, 'Transaction1'))
    ->addTax(8)
    ->applyDiscount(10);

echo $transaction->getCustomer()?->getPaymentProfile()?->id;

/*
$jsonStr = '{"a":1, "b":2, "c":3}';
$arr = json_decode($jsonStr, false);
*/
/*
$obj = new stdClass();
$obj->a = 1;
$obj->b = 2;
*/


