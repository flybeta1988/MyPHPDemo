<?php

function logger($fileName) {
    $fileHandle = fopen($fileName, 'a');
    while (true) {
        fwrite($fileHandle, yield . "\n");
    }
}

$logger = logger(__DIR__ . '/../logs/test.log');
$logger->send('Foo');
$logger->send('Bar');
