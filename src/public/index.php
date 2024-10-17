<?php

use \App\ClassA;

require_once __DIR__ . '/../vendor/autoload.php';

$obj = new ClassA(20, 50);

var_dump($obj->bar());
