<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 上午10:33
 */
class ExpectedErrorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFailingInclude() {
        include 'not_existing_file.php';
    }
}
