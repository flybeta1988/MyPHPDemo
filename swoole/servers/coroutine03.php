<?php
//swoole协程
//添加 2 个协程并发的做一些事情
use Swoole\Coroutine;
use function Swoole\Coroutine\run;

$start = microtime(1);
echo "start:{$start}\n";

run(function () {
    Coroutine::create(function() {
        $a = 'aaa';
        Coroutine::sleep(1);
        echo "func1 ok!\n";
    });

    Coroutine::create(function() {
        $a = 'bbb';
        Coroutine::sleep(3);
        echo "func2 ok!\n";
    });

    go(function () {
        $a = 'ccc';
        Coroutine::sleep(2);
        echo "func3 ok!\n";
    });
});

$end = microtime(1);
echo "end:{$end}\n";

$cost = $end - $start;
echo "cost:{$cost}\n";
