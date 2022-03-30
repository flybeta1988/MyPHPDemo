<?php

$arr1 = array(
    1 => 11,
    2 => 22,
);

$arr2 = array(
    1 => 111,
    2 => 222,
    3 => 333,
);

$arr = $arr1 + $arr2;
//$arr = array_merge($arr1, $arr2);
var_dump($arr);die();

$arr = array(
    array (
        'id' => 100,
        'name' => 'Kandy',
    ),
    array (
        'id' => 101,
        'name' => 'Kandy',
        'age' => 30,
    ),
    array (
        'id' => 102,
        'name' => 'Kandy',
    ),
);

$arr2 = array(
    array (
        'id' => 101,
        'name' => 'Kandy',
        'age' => 30,
    ),
    array (
        'id' => 102,
        'name' => 'Kandy',
        'address' => 'Beijing',
    ),
);

$result = array_merge($arr, $arr2);
print_r($result);
die();

$uids = array(
    [1, 2, 3],
    [4, 3, 6],
    [7, 8],
);

$result = array_merge(...$uids);
print_r($result);
