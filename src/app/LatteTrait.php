<?php

namespace app;

trait LatteTrait
{
    public function makeLatte() {
        echo static::class . 'is making LATTE <br />';
    }
}