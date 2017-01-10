<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 上午9:53
 */
class DependencyFailureTest extends PHPUnit_Framework_TestCase
{
    public function testOne() {
        $this->assertTrue(false);
    }

    /**
     * @depends testOne
     */
    public function testTwo() {

    }
}
