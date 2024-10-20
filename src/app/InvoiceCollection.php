<?php

namespace App;

class InvoiceCollection implements \Iterator
{
    private int $key;

    public function __construct(public array $invoices)
    {
    }

    public function current(): mixed
    {
        echo __METHOD__ . '<br />';
        return $this->invoices[$this->key];
    }

    public function next(): void
    {
        echo __METHOD__ . '<br />';
        ++$this->key;
    }

    public function key(): mixed
    {
        echo __METHOD__ . '<br />';
        return $this->key;
    }

    public function valid(): bool
    {
        echo __METHOD__ . '<br />';
        return isset($this->invoices[$this->key]);
    }

    public function rewind(): void
    {
        echo __METHOD__ . '<br />';
        $this->key = 0;
    }
}