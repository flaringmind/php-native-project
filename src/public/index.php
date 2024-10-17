<?php

require_once __DIR__ . '/../vendor/autoload.php';

$coffeeMaker = new \App\CoffeeMaker();
$coffeeMaker->makeCoffee();
echo '<br />';

$coffeeMaker = new \App\LatteMaker();
$coffeeMaker->makeCoffee();
$coffeeMaker->makeLatte();
echo '<br />';

$coffeeMaker = new \App\CappuccinoMaker();
$coffeeMaker->makeCoffee();
$coffeeMaker->makeCappuccino();
echo '<br />';

$coffeeMaker = new \App\AllInOneCoffeeMaker();
$coffeeMaker->makeCoffee();
$coffeeMaker->makeLatte();
$coffeeMaker->makeOriginalLatte();
$coffeeMaker->makeCappuccino();
echo '<br />';