<?php

function xrange($start, $end, $step = 1) {
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

$range = xrange(1, 10);
var_dump($range);
var_dump($range instanceof Iterator);

foreach ($range as $r) {
    $r->current();
}
