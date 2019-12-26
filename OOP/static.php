<?php

function test1 () {
    //$num = 0;
    static $num = 0;
    echo $num;
    echo "\n";
    $num ++;
}


for ($i = 0; $i < 5; $i++) {
    test1();
}
