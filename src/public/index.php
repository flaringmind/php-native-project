<?php

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new \App\Invoice();

$invoice->process(15, 'Description');
