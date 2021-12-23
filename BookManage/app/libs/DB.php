<?php
namespace App\Libs;

use App\Exceptions\ActionException;

class DB
{
    private static $instance;

    const PAGE_SIZE = 10;

    /**
     * DB constructor.
     * @param array $config
     * @throws \Exception
     */
    public static function getInstance(array $config=[]) {

        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        $host = $config['host'] ?? "127.0.0.1";
        $port = $config['post'] ?? 3306;
        $dbname = $config['dbname'] ?? "bookdb";

        $dsn = sprintf("mysql:host=%s;port=%d;dbname=%s", $host, $port, $dbname);

        $pdo = new \PDO($dsn, 'root', 'root');
        if (is_null($pdo)) {
            throw new \Exception("init db instance fail!");
        }

        return $pdo;
    }

    public static function insert(string $sql) :int {
        $instance = self::getInstance();
        if ($instance->exec($sql)) {
            return $instance->lastInsertId();
        }
        return 0;
    }

    public static function exec($sql) {
        return self::getInstance()->exec($sql);
    }

    public static function getLastInsertId() {
        return self::getInstance()->lastInsertId();
    }

    public static function getTotal(string $sql) {
        $stmt = self::getInstance()->query($sql);
        return $stmt->rowCount();
    }

    public static function getRow(string $sql) {
        $stmt = self::getInstance()->query($sql);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function getRows(string $sql) :array
    {
        if (!($stmt = self::getInstance()->query($sql))) {
            throw new ActionException("get data from DB error, sql:[{$sql}]");
        }
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function parseFilters(array $filters) {
        if (empty($filters)) {
            return '';
        }

        $result = '';
        $wheres = [];
        foreach ($filters as $filter) {

            list($field, $opt, $value) = $filter;

            if ('LIKE' == strtoupper($opt)) {
                $wheres[] = "{$field} {$opt} '%{$value}%'";
            } else {
                $wheres[] = "{$field} {$opt} '{$value}'";
            }
        }

        if ($wheres) {
            $result = join(' ADN ', $wheres);
        }
        return $result;
    }
}