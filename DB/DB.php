<?php

class DB
{
    private static $instance;

    /**
     * @return PDO
     * @throws Exception
     */
    public static function getInstance() {

        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        $host = $config['host'] ?? "127.0.0.1";
        $port = $config['post'] ?? 3306;
        $dbname = $config['dbname'] ?? "test";
        $dsn = sprintf("mysql:host=%s;port=%d;dbname=%s", $host, $port, $dbname);

        $pdo = new PDO($dsn, 'root', 'root');
        if (is_null($pdo)) {
            throw new Exception("init db instance fail!");
        }

        return $pdo;
    }

    public function insert(string $sql) :int {
        return self::getInstance()->exec($sql);
    }

    public function exec($sql) {
        return self::getInstance()->exec($sql);
    }

    public function getLastInsertId() {
        return self::getInstance()->lastInsertId();
    }

    public function getRow(string $sql) {
        $stmt = self::getInstance()->query($sql);
        return$stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getRows(string $sql) :array
    {
        $stmt = self::getInstance()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}