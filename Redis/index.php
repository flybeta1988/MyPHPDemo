<?php
$redis = new Redis();
$redis->connect('localhost', 6379);

$id = 100;
$user_cache_key = 'user_'. $id;
$user = array(
    'id' => $id,
    'name' => 'flybeta',
    'age' => 30,
);

$redis->setex($user_cache_key, 30, json_encode($user));

$json = $redis->get($user_cache_key);
$user = json_decode($json, true);
print_r($user);


