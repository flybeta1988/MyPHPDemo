<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 上午10:41
 */
class OutputTest extends PHPUnit_Framework_TestCase
{
    public function testExpectFooActualFoo() {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBarActualBaz() {
        $this->expectOutputString('bar');
        print 'baz';
    }
}
