<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->select(1);
$redis_name = 'spike';

while ($redis->lLen($redis_name) > 0) {
    $uid = $redis->lPop($redis_name);
    echo "秒杀成功用户:{$uid}<br/>";
}

