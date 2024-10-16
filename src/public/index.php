<?php

require_once __DIR__ . '/../vendor/autoload.php';

$classA = new \App\ClassA();
$classB = new \App\ClassB();

//echo $classA->getName(). '<br />';
//echo $classB->getName(). '<br />';

//echo \App\ClassA::getName(). '<br />';
//echo \App\ClassB::getName(). '<br />';

var_dump(\app\ClassB::make());