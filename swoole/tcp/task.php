<?php

$server = new Swoole\Server('127.0.0.1', 9501);

//设置异步任务的工作进程数量
$server->set([
    'task_worker_num' => 4
]);

//此回调函数在worker进程中执行
$server->on('Receive', function ($server, $fd, $reactor_id, $data) {
    //投递异步任务
    $task_id = $server->task($data);
    echo "Dispatch AsyncTask: id:{$task_id}\n";
});

//处理异步任务(此回调函数在task进程中执行)
$server->on('Task', function ($server, $task_id, $reactor_id, $data) {
    echo "New AsyncTask[id={$task_id}]".PHP_EOL;
    //返回任务执行的结果
    $server->finish("{$data} -> OK");
});

//处理异步任务的结果(此回调函数在worker进程中执行)
$server->on('Finish', function ($server, $task_id, $data) {
    echo "AsyncTask[{$task_id}] Finish: {$data}".PHP_EOL;
});

$server->start();

