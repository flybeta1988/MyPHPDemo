<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 上午10:56
 */
class ArrayWeakComparisonTest extends PHPUnit_Framework_TestCase
{
    public function testEquality() {
        $this->assertEquals(
            [1, 2, 3, 4, 5, 6],
            ['1', 2, 33, 4, 5, 6]
        );
    }
}
