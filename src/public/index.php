<?php

use \App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

set_exception_handler(function (\Throwable $e) {
    var_dump($e->getMessage());
});

echo array_rand([], 1);

var_dump(processInvoice());

function processInvoice() {
    $invoice = new Invoice(new \App\Customer([1]));

    try {
        $invoice->process(-24);
        return true;
    } catch (\App\Exception\MissingBillingInfoException | \InvalidArgumentException $e) {
        echo $e->getMessage() . $e->getFile() . ': on line ' . $e->getLine() . '<br />';
        return false;
    } finally {
        echo 'finally block <br />';
        return 'Finally';
    }
}

