<?php

function foo1() {
    $str = yield '666';
    echo $str. "\n";
}

$foo1 = foo1();
var_dump($foo1->send('Hello yield'));
die();


function foo2() {
    yield 'php';
}

foreach (foo2() as $f) {
    echo $f;
}
