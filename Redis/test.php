<?php

function add($a, $b) {
    return $a + $b;
}

function add2(...$args) {
    $result = 0;
    foreach ($args as $arg) {
        $result += $arg;
    }
    return $result;
}

echo add(...[1, 2])."\n";

$a = [1, 2];
echo add(...$a). PHP_EOL;

echo add2(...$a). PHP_EOL;

var_dump(...$a);


