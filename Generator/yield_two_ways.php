<?php

//http://www.laruence.com/2015/05/28/3038.html

function gen() {
    $ret = yield 'yield1';
    var_dump($ret);

    $ret = yield 'yield2';
    var_dump($ret);
}

$gen = gen();

var_dump($gen->current()); // string(6) "yield1"

var_dump($gen->send('ret1'));
// string(4) "ret1"   (the first var_dump in gen)
// string(6) "yield2" (the var_dump of the ->send() return value)

echo "====\n";
var_dump($gen->send('ret2'));
// string(4) "ret2"   (again from within gen)
// NULL               (the return value of ->send())
