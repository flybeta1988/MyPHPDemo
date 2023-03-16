<?php

function test1 () {
    //$num = 0;
    static $num = 0;
    echo $num;
    echo "\n";
    $num ++;
}

function test2($i) {
    static $ids;
    if (isset($ids[$i])) {
        //echo($i);die();
        echo "xxx[{$i}]xxx\n";
        return $ids[$i];
    } else {
        echo "yyy[{$i}]yyy\n";
    }
    $ids[$i] = $i;
    return $ids[$i];
}

function test3($i) {
    static $ids;
    if (isset($ids)) {
        //echo($i);die();
        echo "xxx[{$i}]xxx\n";
        return $ids;
    } else {
        echo "yyy[{$i}]yyy\n";
    }
    $ids = $i;
    return $ids;
}

echo "result:".test2(1);
echo PHP_EOL;
echo "result:".test2(2);
echo PHP_EOL;
echo "result:".test2(2);

for ($i = 0; $i < 5; $i++) {
    //test1();
    //test2($i);
    //test2($i);
    //test3($i);
    //test3($i);
}
