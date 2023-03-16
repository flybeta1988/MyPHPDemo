<?php
function f(): Generator {
    yield;
    yield;
    yield;
}

$f = f();
//$f->send(1);
//$f->next();
//$f->rewind();

if ($f instanceof Iterator) {
    echo "Yes". PHP_EOL;
} else {
    echo "No". PHP_EOL;
} die();

foreach ($f as $v) {
    var_dump($v);
}

try {
    var_dump($f->getReturn());
} catch (Exception $e) {
    echo $e->getCode(). ":". $e->getMessage();
}
