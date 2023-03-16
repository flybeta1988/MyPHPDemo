<?php
$redis = new Redis();
$redis->connect('localhost', 6379);

$key = 'living_course_id_list';
$redis->sAdd($key, 100);
$redis->sAdd($key, 101);
$redis->sAdd($key, 102);
$redis->sAdd($key, 103);

$id_list = $redis->sMembers($key);
print_r($id_list);

$del_id_list = [100, 102];
$r = $redis->sRem($key, ...$del_id_list);
var_dump($r);

$id_list = $redis->sMembers($key);
print_r($id_list);


