<?php

namespace app;

class Invoice
{
    private string $id;

    public function __construct(
        public float $amount,
        public string $description,
        public string $creditCardNumber,
    )
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

    public function __sleep(): array
    {
         return ['id', 'amount'];
    }

    public function __serialize(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'amount' => $this->amount,
            'creditCardNumber' => base64_encode($this->creditCardNumber),
            'foo' => 'bar',
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->description = $data['description'];
        $this->creditCardNumber = base64_decode($data['creditCardNumber']);
    }

}