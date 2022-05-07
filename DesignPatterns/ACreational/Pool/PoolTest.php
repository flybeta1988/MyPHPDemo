<?php
namespace DesignPatterns\ACreational\Pool;

use PHPUnit\Framework\TestCase;

include_once("../../autoload.php");

class PoolTest extends TestCase
{
    public function testCanGetNewInstancesWithGet()
    {
        $pool = new WorkerPool();
        $work1 = $pool->get();
        $work2 = $pool->get();

        $this->assertCount(2, $pool);
        $this->assertNotSame($work1, $work2);
    }

    public function testCanGetSameInstanceTwiceWhenDisposingItFirst()
    {
        $pool = new WorkerPool();
        $worker1 = $pool->get();
        $pool->dispose($worker1);
        $worker2 = $pool->get();

        $this->assertCount(1, $pool);
        $this->assertSame($worker1, $worker2);
    }
}