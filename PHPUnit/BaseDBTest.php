<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 16-6-7
 * Time: 下午3:07
 */
require_once 'PHP/Token/Stream/Autoload.php';
require_once 'PHPUnit/Extensions/Database/TestCase.php';

abstract class BaseDBTest extends PHPUnit_Extensions_Database_TestCase
{
    //只实例化 pdo 一次，供测试的清理和装载基境使用
    static private $pdo = null;

    //对于每个测试，只实例化 PHPUnit_Extensions_Database_DB_IDatabaseConnection 一次
    private $conn = null;

    static public $o;

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setup();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        echo "BaseDBTest getConnection \n";

        return $this->conn;
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        echo "BaseDBTest getDataSet \n";
    }

}
