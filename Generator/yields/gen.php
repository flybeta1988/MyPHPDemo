<?php
function gen() {
    $ret = yield 'yield1';
    var_dump($ret);

    $ret = yield 'yield2';
    var_dump($ret);

    $a = new SplQueue();
}

$gen = gen();
var_dump($gen->current());
$result = $gen->send('ret1');
var_dump($result);

echo "===============>\n";
var_dump($gen->current());
$result2 = $gen->send('ret2');
var_dump($result2);
