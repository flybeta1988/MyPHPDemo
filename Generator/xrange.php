<?php

/**
 * 当然,也可以不同通过生成器来实现这个功能,而是可以通过继承Iterator接口实现.
 * 但通过使用生成器实现起来会更方便,不用再去实现iterator接口中的5个方法了.
 *
 * 要从生成器认识协程, 理解它内部是如何工作是非常重要的:
 * 生成器是一种可中断的函数, 在它里面的yield构成了中断点.
 *
 * @param $start
 * @param $end
 * @param int $step
 * @return Generator
 */
function xrange($start, $end, $step = 1) {
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

$range = xrange(1, 10);
var_dump($range);
var_dump($range instanceof Iterator);

//$range->rewind();
//$range->next();
$current = $range->current();
var_dump($current);

foreach ($range as $key => $value) {
    //echo $key. " => ". $value. "\n";
}
