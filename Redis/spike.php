<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->select(1);
$redis_name = 'spike';
$limit = 5;
$total = 20;
$n = 0;

while ($total --) {
    $n ++;
    $uid = mt_rand(1000, 9999);
    if ($redis->lLen($redis_name) < $limit) {
        $redis->rPush($redis_name, $uid);
        echo "{$uid} 秒杀成功:{$n}<br/>";
    } else {
        echo "{$uid} 秒杀已结束:{$n}<br/>";
    }
}

