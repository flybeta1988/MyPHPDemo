<?php

$user_list = array(
    array(
        'id' => 100,
        'name' => '张三',
        'age' => '25',
        'birthday' => '2011/7/11',
        'money' => '1.2e3',
        'price' => 100.01,
        'desc' => "<a href='http://www.baidu.com\/'>免费领红包1</a>",
    ),
    array(
        'id' => 101,
        'name' => '李四',
        'age' => '27',
        'birthday' => '2012/8/12',
        'money' => '100.02',
        'price' => 100.00,
        'desc' => "<a href='http://www.baidu.com\/'>免费领红包2</a>",
    ),
    array(
        'id' => 102,
        'name' => '王五',
        'age' => '26',
        'birthday' => '2018/7/09',
        'money' => 100.185,
        'price' => 100.10,
        'desc' => "<a href='http://www.baidu.com\/'>免费领红包3</a>",
    )
);


echo "\n=== 示例1 ==== \n";
echo json_encode($user_list);

echo "\n\n=== 示例2 ==== \n";
echo json_encode($user_list, JSON_PRETTY_PRINT);

echo "\n\n=== 示例3 ==== \n";
echo json_encode($user_list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

echo "\n\n=== 示例4 ==== \n";
echo json_encode($user_list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);

echo "\n\n=== 示例5 ==== \n";
echo json_encode($user_list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES);

echo "\n\n=== 示例6 ==== \n";
echo json_encode($user_list, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);