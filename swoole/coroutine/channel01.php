<?php
use Swoole\Coroutine;
use Swoole\Coroutine\Channel;
use function Swoole\Coroutine\run;

//Co::set(['hook_flags'=> SWOOLE_HOOK_ALL]);

function printLogWithTime($msg) {
    echo microtime(true). " ". $msg. "\n";
}

//https://www.cnblogs.com/wscsq789/p/13743532.html
run(function() {

    $channel = new Channel(1);

    Coroutine::create(function () use ($channel) {

        for($i = 1; $i <= 6; $i++) {

            printLogWithTime("start push{$i}...");

            $channel->push( "数据 i:" . $i . "\n");

            printLogWithTime("end push{$i} 第{$i}次塞数据时间");
        }
    });

    Coroutine::create(function () use ($channel) {

        while (1) {

            echo "\n";
            printLogWithTime('start pop...');
            
            if ($channel->isEmpty()) {
                printLogWithTime('channel empty break!');
                break;
            }

            $data = $channel->pop();
            if ($data) {
                printLogWithTime("end pop 取到数据:". $data);
                //echo $data . "\n";
                //Co::sleep(2);
                Coroutine::sleep(2);
            } else {
                printLogWithTime("end pop because no data break 取数据时间");
                break;
            }
        }
    });

});