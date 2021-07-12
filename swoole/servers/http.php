<?php

use Swoole\Coroutine\Channel;

include_once __DIR__."/../data/CourseService.php";

$http = new Swoole\Http\Server('0.0.0.0', 9501);

$channel = new Channel(100);

$http->on('Request', function ($request, $response) use($channel) {
    var_dump($request->getRequestParam());
    echo "Method:{$request->getMethod()}\n";
    $response->header('Content-Type', 'text/html; charset=utf-8');
    CourseService::getCourseList($channel);
    $result = $channel->pop();
    $response->end(var_export($result, true));
});

echo "Http Server Started ...\n";

$http->start();