<?php

namespace app;

trait CappuccinoTrait
{
    public function makeCappuccino() {
        echo static::class . 'is making CAPPUCCINO <br />';
    }

    public function makeLatte() {
        echo static::class . ' is making LATTE (FROM CAPPUCCINO TRAIT) <br />';
    }
}