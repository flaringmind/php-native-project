<?php

namespace App;

class Invoice
{
    private float $amount;
    private int $id = 123;
    private string $accountNumber = '23456789876543';

    public function __debugInfo(): ?array
    {
        return [
            'id' => $this->id,
            'accountNumber'=> '****' . substr($this->accountNumber, -4)
        ];
    }

}