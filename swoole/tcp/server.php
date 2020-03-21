<?php

$server = new Swoole\Server('127.0.0.1', 9501);

//监听连接进入事件
$server->on('Connect', function ($serv, $fd) {
    echo "Client: Connect.\n";
});

//监听数据接收事件
$server->on('Receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server: ".$data);
});

//监听连接关闭事件
$server->on('Close', function ($serv, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$server->start();