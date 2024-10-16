<?php

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new \App\Invoice(15);

$invoice->amount = 15;
var_dump(isset($invoice->amount));

unset($invoice->amount);

var_dump(isset($invoice->amount));