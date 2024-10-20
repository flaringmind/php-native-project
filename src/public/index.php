<?php

use \App\Invoice;
use App\InvoiceAggregateCollection;
use App\InvoiceCollection;

require_once __DIR__ . '/../vendor/autoload.php';

$invoiceCollection = new InvoiceAggregateCollection([new Invoice(100), new Invoice(200), new Invoice(300)]);

foreach ($invoiceCollection as $invoice) {
    echo $invoice->id . ' : ' . $invoice->amount . '<br />';
}
