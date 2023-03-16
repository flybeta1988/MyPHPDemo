<?php
//swoole协程
//添加 2 个协程并发的做一些事情
use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function () {
    Coroutine::create(function() {
        Coroutine::sleep(4);
        var_dump(file_get_contents("http://127.0.0.1:9501/"));
    });

    Coroutine::create(function() {
        Coroutine::sleep(6);
        echo "done\n";
    });
});
echo 1;//可以得到执行
