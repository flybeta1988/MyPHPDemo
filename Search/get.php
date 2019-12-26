<?php

use Elasticsearch\ClientBuilder;

require_once __DIR__. '/../vendor/autoload.php';

$client = ClientBuilder::create()->build();

$params = [
    'index' => 'megacorp',
    'type' => 'employee',
    'id' => 4,
];

$response = $client->get($params);
//$response = $client->getSource($params);
print_r($response);