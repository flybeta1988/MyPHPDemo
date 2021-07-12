<?php
//swoole协程
//启动一个全协程 HTTP 服务
use Swoole\Coroutine\Http\Server;
use function Swoole\Coroutine\run;

run(function () {
    $server = new Server('127.0.0.1', 9501, false);
    $server->handle('/', function ($request, $response) {
        $response->end("<h1>Index</h1>");
    });
    $server->handle('/foo/a', function ($request, $response) {
        $response->end("<h1>Foo A</h1>");
    });
    $server->handle('/foo/b', function ($request, $response) {
        $response->end("<h1>Foo B</h1>");
    });
    $server->handle('/test', function ($request, $response) {
        $response->end("<h1>Test</h1>");
    });
    $server->handle('/stop', function ($request, $response) use ($server) {
        $response->end("<h1>Stop</h1>");
        $server->shutdown();
    });
    $server->start();
});
echo 1;//得不到执行
