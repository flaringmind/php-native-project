<?php

use \App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$dateTime = new DateTime('yesterday noon', new DateTimeZone('Europe/Amsterdam'));

var_dump($dateTime);

