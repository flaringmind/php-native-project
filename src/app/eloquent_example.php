<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../eloquent.php';

//Capsule::connection()->transaction(function () {
//    $invoice = new \App\Models\Invoice();
//
//    $invoice->amount = 45;
//    $invoice->invoice_number = '1';
//    $invoice->status = InvoiceStatus::Pending;
//    $invoice->due_date = (new Carbon())->addDays(10);
//
//    $invoice->save();
//
//    $items = [['Item 1', 1, 15], ['Item 2', 2, 3.78], ['Item 3', 123, 1.13]];
//
//
//    foreach ($items as [$description, $quantity, $unitPrice]) {
//        $item = new \App\Models\InvoiceItem();
//
//        $item->description = $description;
//        $item->quantity = $quantity;
//        $item->unit_price = $unitPrice;
//
//        $item->invoice()->associate($invoice);
//        $item->save();
//    }
//});
$invoiceId = 25;
Invoice::query()->where('id',  $invoiceId)->update(['status' => InvoiceStatus::Paid]);

Invoice::query()->where('status',  InvoiceStatus::Paid)->get()->each(function (Invoice $invoice) {
    echo $invoice->id . ',' . $invoice->status->toString() . ',' . $invoice->created_at->format('m/d/Y') . PHP_EOL;

    $invoice->items()->where('description', 'Item 2')->delete();
});

