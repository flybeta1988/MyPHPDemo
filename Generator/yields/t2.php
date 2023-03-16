<?php
function sleepiterate($length) {
    for ($i=0; $i < $length; $i++) {
        sleep(2);
        yield $i;
    }
}

foreach (sleepiterate(5) as $i) {
    echo $i, PHP_EOL;
}
