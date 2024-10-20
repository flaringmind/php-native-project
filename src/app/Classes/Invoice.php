<?php

declare(strict_types=1);

namespace App\Classes;

class Invoice
{
    public function index(): string
    {
        return '<h1>Invoices</h1> <br />';
    }

    public function create(): string
    {
        return '<h1>Create Invoice</h1> <br />';
    }

}