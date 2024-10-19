<?php

namespace app;

class Invoice
{
    private string $id;

    public function __construct()
    {
        $this->id = uniqid('invoice');
        var_dump('__construct');
    }

    public static function create(): static
    {
        return new static();
    }

    public function __clone(): void
    {
        $this->id = uniqid('invoice');
        var_dump('__clone');
    }
}