<?php

namespace App\Services\Shipping;

class Weight
{
    public function __construct(public readonly int $value)
    {
        if ($value <= 0 || $value > 500) {
            throw new \InvalidArgumentException('Invalid package weight');
        }
    }

    public function equalTo(Weight $other): bool
    {
        return $this->value === $other->value;
    }
}