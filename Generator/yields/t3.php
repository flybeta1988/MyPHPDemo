<?php

function createRange1($num) {
    $times = [];
    for ($i = 0; $i <= $num; $i++) {
        $times[] = time();
    }
    return $times;
}

function createRange2($num) {
    for ($i = 0; $i <= $num; $i++) {
        yield time();
    }
}
/*
foreach (createRange1(10) as $value) {
    sleep(1);
    echo $value. "\n";
}*/

$type = 1;
switch ($type) {
    case 1:
        echo "1\n";
    case 2:
        echo "2\n";
        break;
    default:
        echo "0\n";
}