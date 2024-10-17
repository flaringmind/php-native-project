<?php

use \App\ClassA;

require_once __DIR__ . '/../vendor/autoload.php';

$obj = new ClassA(20, 50);
$obj2 = new ClassA(20, 50);
$obj3 = $obj2;
var_dump($obj2 == $obj3);
var_dump($obj2 === $obj3);

