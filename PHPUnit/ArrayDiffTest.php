<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 上午10:47
 */
class ArrayDiffTest extends PHPUnit_Framework_TestCase
{
    public function testEquality() {
        $this->assertEquals(
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2,  3, 4, 5, 6],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 33, 4, 5, 6]
        );
    }
}
