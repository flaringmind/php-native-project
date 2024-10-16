<?php

declare(strict_types=1);

use App\PaymentGateway\Paddle\Transaction;

require_once __DIR__ . '/../vendor/autoload.php';

$fields = [
    new \App\Text('textField'),
    new \App\Checkbox('checkboxField'),
    new \App\Radio('radioField'),
];

foreach ($fields as $field) {
    echo $field->render() . '<br />';
}
