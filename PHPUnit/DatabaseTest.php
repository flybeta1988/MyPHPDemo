<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-10
 * Time: 下午1:54
 */
class DatabaseTest extends PHPUnit_Framework_TestCase
{
    protected static $dbh;

    public static function setUpBeforeClass()
    {
        self::$dbh = new PDO('sqlite::memory:');
    }

    public static function tearDownAfterClass()
    {
        self::$dbh = null;
    }
}
