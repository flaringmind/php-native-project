<?php

declare(strict_types=1);

namespace App\Classes;

class InvoiceController
{
    public function index(): string
    {
        setcookie(
            'userName',
            'Andrew',
            time() - 24 * 60 * 60,
        );
        return '<h1>Invoices</h1> <br />';
    }

    public function create(): string
    {
        return '<form action="/invoices/create" method="post"><label>Enter the Amount</label><input type="text" name="amount"></form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }


}