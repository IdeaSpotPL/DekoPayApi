<?php

include_once __DIR__ . '/../vendor/autoload.php';

use IdeaSpot\DekoPayApi\Core\DekoPayApiClient;

$client = new DekoPayApiClient('', 'b70deab915958d4146f69173100c64f3');
$financeCalculator = $client->getFinanceCalculator();
$response = $financeCalculator->calculate('ONIB36-9.9', 4000, 9, 100);
var_dump($response);