<?php

namespace app;

class AllInOneCoffeeMaker extends CoffeeMaker
{
    use CappuccinoTrait {
        CappuccinoTrait::makeLatte insteadof LatteTrait;
    }
    use LatteTrait {
        LatteTrait::makeLatte as makeOriginalLatte;
    }
}