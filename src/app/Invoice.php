<?php

namespace App;

class Invoice
{
    public string $id;

    public function __construct(public float $amount)
    {
        $this->id = random_int(100, 100000);
    }

}