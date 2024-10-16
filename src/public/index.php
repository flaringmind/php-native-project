<?php

require_once __DIR__ . '/../vendor/autoload.php';

$collector = new \App\DebtCollectionService();

echo $collector->collectDebt(new \App\CollectionAgency()) . PHP_EOL;
