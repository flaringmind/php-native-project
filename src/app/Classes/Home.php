<?php

declare(strict_types=1);

namespace App\Classes;

class Home
{
    public function index(): string
    {
        return '<h1>HomePage</h1> <br />';;
    }
}