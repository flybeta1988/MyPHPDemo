<?php
use Swoole\Coroutine;
use Swoole\Coroutine\Channel;
use function Swoole\Coroutine\run;

//Co::set(['hook_flags'=> SWOOLE_HOOK_ALL]);

run(function () {
    $channel = new Channel(10);
    $id_list = [];

    Coroutine::create(function () use ($channel, &$id_list) {
        //$channel->push(111);
        $id_list[] = 111;
    });

    Coroutine::create(function () use ($channel, &$id_list) {
        $id_list[] = 222;
    });

    var_dump($id_list);

});
