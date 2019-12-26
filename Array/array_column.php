<?php

$user_list = array(
    array(
        'id' => 100,
        'name' => '张三',
    ),
    array(
        'id' => 101,
        'name' => '李四',
    ),
    array(
        'id' => 102,
        'name' => '王五',
    ),
    array(
        'id' => 102,
        'name' => '王五2',
    ),
);

$result = array_column($user_list, 'name', 'id');
print_r($result);