<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Models\Invoice;
use App\Models\SignUp;
use App\Models\Transaction;
use App\Models\User;
use App\View;

class HomeController
{
    public function index(): View
    {

        $email = 'dungeon@master' . rand(100, 1000) . '.com';
        $name = 'Dungeon Master' . rand(100, 1000);
        $amount = 250;

        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name' => $name,
            ],
            [
                'amount' => $amount,
            ]
        );

        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    public function renderUpload(): View
    {
        return View::make('upload', []);
    }

    public function upload()
    {
        $transactionModel = new Transaction();
        $lastId = $transactionModel->createMany();
        header('Location: /transactions');
    }

    public function transactions(): View
    {
        $transactionModel = new Transaction();
        return View::make('transactions', ['transaction_list' => $transactionModel->find()]);
    }

}