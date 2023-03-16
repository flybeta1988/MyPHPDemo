<?php

function cube($n)
{
    return($n * $n * $n);
}

$a = array(1, 2, 3);
$b = array_map("cube", $a);
print_r($b);



