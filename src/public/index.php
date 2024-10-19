<?php

use \App\Invoice;

require_once __DIR__ . '/../vendor/autoload.php';

$invoice = new Invoice(250, 'asdasd', 'sadasdsa');

$str = serialize($invoice);
echo $str;
echo '<br />';
echo '<br />';
echo '<br />';
$invoice2 = unserialize($str);
var_dump($invoice2);

echo '<br />';
echo '<br />';
echo '<br />';
echo serialize(true) . '<br />';
echo serialize(11) . '<br />';
echo serialize(2.4) . '<br />';
echo serialize('sdasdas') . '<br />';




