<?php
namespace App\Libs;

use App\Exceptions\ActionException;

class DB
{
    private static $instance;

    const PAGE_SIZE = 100;

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

        $pdo = new \PDO($dsn, 'root', '123456');
        if (is_null($pdo)) {
            throw new \Exception("init db instance fail!");
        }

        //Log::info(__METHOD__. " new pdo ok!");

        self::$instance = $pdo;

        return $pdo;
    }

    public static function insert(string $sql) :int {
        $instance = self::getInstance();
        if ($instance->exec($sql)) {
            return $instance->lastInsertId();
        }
        return 0;
    }

    public static function update(string $sql) {
        return self::getInstance()->exec($sql);
    }

    public static function delete(string $sql) {
        return self::getInstance()->exec($sql);
    }

    public static function exec($sql) {
        return self::getInstance()->exec($sql);
    }

    public static function beginTransaction() {
        return self::getInstance()->beginTransaction();
    }

    public static function commit() {
        return self::getInstance()->commit();
    }

    public static function rollBack() {
        return self::getInstance()->rollBack();
    }

    public static function getLastInsertId() {
        return self::getInstance()->lastInsertId();
    }

    public static function getTotal(string $sql) {
        if (!($stmt = self::getInstance()->query($sql))) {
            return 0;
        }
        return $stmt->rowCount();
    }

    public static function getRow(string $sql) {
        if (!($stmt = self::getInstance()->query($sql))) {
            throw new ActionException("get data from DB error, sql:[{$sql}]");
        }
        //Log::info(__METHOD__. " stmt:". var_export($stmt, true));
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
            //return '';
        }

        $result = '';
        $wheres = ['ISNULL(dtime)'];

        foreach ($filters as $filter) {
            list($field, $opt, $value) = $filter;
            if ('LIKE' == strtoupper($opt)) {
                $wheres[] = "{$field} {$opt} '%{$value}%'";
            } elseif ('IN' == strtoupper($opt)) {
                $wheres[] = "{$field} {$opt} ({$value})";
            } else {
                $wheres[] = "{$field} {$opt} '{$value}'";
            }
        }

        if ($wheres) {
            $result = join(' AND ', $wheres);
        }
        return $result;
    }
}