<?php

use Swoole\Coroutine;
use Swoole\Coroutine\Channel;
use Swoole\Coroutine\Http\Server;
use function Swoole\Coroutine\run;

include_once __DIR__."/../data/CourseService.php";

run(function () {

    $http = new Server('0.0.0.0', 9502);
    /*$http->set(array(
        'heartbeat_idle_time' => 600,
        'heartbeat_check_interval' => 60,
    ));*/

    $http->handle('/', function ($request, $response) {
        $response->end('index');
    });

    $http->handle('/swoole', function ($request, $response) {
        //$url = $request->server['path_info'] ?? '';
        //echo "Method:{$request->getMethod()} url:{$url}\n";

        //echo round(memory_get_usage() / 1024 / 1024, 2) . ' MB' . PHP_EOL;

        $courseService = new CourseService();
        $course_list = $courseService->getCourseListByBarrier();

        echo date('Y-m-d H:i:s'). " last result:". json_encode($course_list). "\n";
        $response->header('Content-Type', 'text/html; charset=utf-8');
        $response->end(json_encode($course_list));
        //$response->end('Hello Swoole');

        //echo round(memory_get_usage() / 1024 / 1024, 2) . ' MB' . PHP_EOL;
        //$response->end("<h1>Index</h1>");
    });

    /*$http->on('start', function ($server) {
        echo "Swoole http server is started at http://127.0.0.1:9501\n";
    });

    $http->on('Request', function ($request, $response) {
        $response->end("<h1>On request</h1>");
    });*/

    $http->start();
});