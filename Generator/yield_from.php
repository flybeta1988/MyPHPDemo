<?php

function count_to_ten() {
    yield 1;
    yield 2;
    yield from [3, 4];
    yield from new ArrayIterator([5, 6]);
    yield from seven_eight();
    return yield from nine_ten();
}

function seven_eight() {
    yield 7;
    yield from eight();
    return "777";
}

function eight() {
    yield 8;
    return "8888";
}

function nine_ten() {
    yield 9;
    return "I am return result";
}

$gen = count_to_ten();
foreach ($gen as $num) {
    var_dump($num);
    echo "====\n";
    //echo "$num ";
}
echo $gen->getReturn();
