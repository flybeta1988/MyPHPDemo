<?php
define('MEMCACHED_PERSISTENT_ID', 'xnw');

$m1 = new Memcached(MEMCACHED_PERSISTENT_ID);
//$memcahced->addServer('192.168.2.149', 11210);
$m1->addServer('127.0.0.1', 11211);

$cacheId = 'hcftest';
$m1->set($cacheId, 'Hello Memcached:'. mt_rand(1000, 9999));

$m2 = new Memcached(MEMCACHED_PERSISTENT_ID);
//$m2->addServer('127.0.0.1', 11210);

$m3 = new Memcached(MEMCACHED_PERSISTENT_ID);
//$m3->addServer('127.0.0.1', 11210);

var_dump($m1->getStats());
print_r($m2->getStats());
print_r($m3->getStats());
