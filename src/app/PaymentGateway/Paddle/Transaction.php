<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;

class Transaction
{
    private static int $count = 0;
    public function __construct(
        public float $amount,
        public string $description
    ) {
        self::$count++;
    }

    public static function getCount(): int
    {
        return self::$count;
    }

    public function process()
    {
        array_map(function(){
            var_dump($this->amount);
        }, [1]);
    }

}