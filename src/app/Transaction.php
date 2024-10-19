<?php

namespace app;

/**
 * @property-read int $x
 * @property-write float $y
 * @method static int foo(string $x)
 */
class Transaction
{
    /** @var Customer */
    private $customer;

    /** @var float */
    private $amount;


    /**
     * @param Customer[] $arr
     * @return void
     */
    public function foo(array $arr)
    {
        foreach ($arr as $obj) {
            /** var @Customer $obj */
            $obj->name;
        }
    }

    /**
     * Description...
     *
     * @param Customer $customer
     * @param int $amount
     *
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     *
     * @return bool
     */
    public function process(Customer $customer, int $amount): bool
    {
        return true;
    }
}