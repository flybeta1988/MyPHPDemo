<?php

$memcached = new Memcached();
$memcached->addServer('127.0.0.1', 11211);

//$stats = $memcached->getStats();
//var_dump($stats);

$keys = $memcached->getAllKeys();
var_dump($keys);

var_dump($memcached->get('hcftest'));

$obj = $memcached->get('animal');
var_dump($obj);
