<?php

require __DIR__ . '/vendor/autoload.php';

use App\MoneyFormatter;
use App\NumberFormatter;

$inputs = [
    12345678,
    0,
    9999999,
    11234,
    12.22,
    -12.12,
    -12345,
    -12345678,
    -123456
];
foreach ($inputs as $input) {
    echo $input . ' => ' . (new MoneyFormatter((new NumberFormatter())))->formatEur($input) . "\n";
}
echo PHP_EOL;
foreach ($inputs as $input) {
    echo $input . ' => ' . (new MoneyFormatter((new NumberFormatter())))->formatUsd($input) . "\n";
}