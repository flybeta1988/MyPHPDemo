<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-3-29
 * Time: 下午4:57
 */

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
