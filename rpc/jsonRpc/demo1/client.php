<?php
require_once 'JsonRPCClient.php';

$url = 'http://demo.t.me:8081/rpc/jsonRpc/demo1/server.php';

$myExample = new JsonRPCClient($url, 1);

// 客户端调用
try {
    $name = $myExample->getName();
    echo $name ;
} catch (Exception $e) {
    echo nl2br($e->getMessage())." \n";
}