<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 上午9:58
 */
class MultipleDependenciesTest extends PHPUnit_Framework_TestCase
{
    public function testProducerFirst() {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond() {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer() {
        $this->assertEquals(
            ['first', 'second'],
            func_get_args()
        );
    }
}
