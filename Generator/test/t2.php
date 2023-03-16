<?php
$gen = (function() {
    yield 1;
    yield 2;
    yield 3;
    return 4;
})();

//$gen->send(4);
//$gen->rewind();

foreach ($gen as $key => $val) {
    echo $key. " => ". $val, PHP_EOL;
}

echo $gen->getReturn(), PHP_EOL;

