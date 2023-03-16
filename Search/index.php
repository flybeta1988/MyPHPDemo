<?php

use Elasticsearch\ClientBuilder;

require_once __DIR__. '/../vendor/autoload.php';

$client = ClientBuilder::create()->build();

$params = [
    'index' => 'megacorp',
    'type' => 'employee',
    'id' => 0,
    'body' => []
];

$response = $client->index($params);
print_r($response);

