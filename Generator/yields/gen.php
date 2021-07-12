<?php
function gen() {
    $ret = yield 'yield01';
    var_dump($ret);

    $ret = yield 'yield02';
    var_dump($ret);

    $ret = yield 'yield03';
    var_dump($ret);

    $ret = yield 'yield04';
    var_dump($ret);
}

$gen = gen();
var_dump($gen->current());
var_dump($gen->send('ret1'));

echo "\n";
var_dump($gen->current());
var_dump($gen->send('ret2'));

echo "\n";
var_dump($gen->current());
var_dump($gen->send('ret3'));
