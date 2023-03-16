<?php

include_once "../OOP/Account.php";
include_once "../OOP/Animal.php";


$memcached  = new Memcached();
$memcached->addServer('127.0.0.1',11211);

$account = new Account();
$animal = new \OOP\Animal($account);
if ($memcached->add("animal", $animal, 3600)) {
    echo 'animal save ok!';
} else {
    echo 'animal 已存在';
}
echo "<br/>";

if ($memcached->add("myObj", new stdClass(), 3600)) {
    echo 'stdClass save ok!';
} else {
    echo 'stdClass 已存在';
}
echo "<br/>";

if( $memcached->add("mystr","this is a memcache test!",3600)){
    echo  '原始数据缓存成功!';
}else{
    echo '数据已存在：'.$memcached->get("mystr");
}
