<?php
function getValues1() {
    $valuesArray = [];
    // 获取初始内存使用量
    echo round(memory_get_usage() / 1024 / 1024, 2) . ' MB' . PHP_EOL;
    for ($i = 1; $i < 800000; $i++) {
        $valuesArray[] = $i;
        // 为了让我们能进行分析，所以我们测量一下内存使用量
        if (($i % 200000) == 0) {
            // 来 MB 为单位获取内存使用量
            echo round(memory_get_usage() / 1024 / 1024, 2) . ' MB'. PHP_EOL;
        }
    }
    return $valuesArray;
}

function getValues2() {
    // 获取初始内存使用量
    echo round(memory_get_usage() / 1024 / 1024, 2) . ' MB' . PHP_EOL;
    for ($i = 1; $i < 8; $i++) {
        yield $i;
        // 为了让我们能进行分析，所以我们测量一下内存使用量
        if (($i % 200000) == 0) {
            // 来 MB 为单位获取内存使用量
            echo round(memory_get_usage() / 1024 / 1024, 2) . ' MB'. PHP_EOL;
        }
    }
    return 'This is value2!';
}

$start_time = microtime(true);
$myValues = getValues2();
foreach ($myValues as $value) {
    echo $value. ' '. PHP_EOL;
}
$end_time = microtime(true);
echo "time: ", bcsub($end_time, $start_time, 4), "\n";

//var_dump($myValues->getReturn());
