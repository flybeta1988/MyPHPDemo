<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-1-18
 * Time: 上午10:56
 */
require_once 'BaseDBTest.php';

class DBTest extends BaseDBTest
{
    protected $fixture = 'data/news.xml';

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        print "createDataSet ". $this->fixture. "\n";
        return $this->createMySQLXMLDataSet($this->fixture);
    }

    /**
     * @param $a
     * @param $b
     * @param $expected
     */
    public function testAdd() {
        $this->assertTrue(true);
    }
}
