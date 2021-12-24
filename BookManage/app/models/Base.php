<?php
namespace App\Models;

use App\Libs\DB;
use App\Libs\Log;

class Base
{
    protected $table;

    protected $originals = [];

    protected $attributes = [];

    private $sql_debug = 1;

    public function __construct() {
        $this->attributes["ctime"] = time();
    }

    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function __get(string $name) {
        return $this->attributes[$name] ?? '';
    }

    public function delete() {
        $this->dtime = time();
        return $this->update();
    }

    public function deleteForce() {
        $sql = sprintf(
            "DELETE FROM `%s` WHERE id = %d LIMIT 1", $this->table, $this->id
        );

        if ($this->sql_debug) {
            Log::info(__METHOD__. " sql: {$sql}");
        }

        return DB::delete($sql);
    }

    public function save() {
        if ($this->id > 0) {
            $this->update();
        } else{
            $this->insert();
        }
        return $this;
    }

    private function insert() {
        $fields = $values = [];

        foreach ($this->attributes as $key => $value) {
            $fields[] = $key;
            $values[] = $value;
        }

        array_walk($fields, function (&$field) {
            $field = "`{$field}`";
        });

        array_walk($values, function (&$value) {
            $value = trim($value);
            $value = is_numeric($value) ? "{$value}" : "'{$value}'";
        });

        $sql = sprintf(
            "INSERT INTO `%s` (%s) VALUE(%s)",
            $this->table, join(",", $fields), join(",", $values)
        );

        if ($this->sql_debug) {
            Log::info(__METHOD__. " sql: {$sql}");
        }

        return DB::insert($sql);
    }

    private function update($is_delete=0) {
        $set = "SET ";
        $fields = [];

        if (!($changed = array_diff_assoc($this->attributes, $this->originals))) {
            Log::info(__METHOD__. " no attribute changed!");
            return false;
        }

        foreach ($changed as $key => $value) {
            $fields[] = "{$key}='{$value}'";
        }

        if (!$is_delete) {
            $fields[] = "utime=". time();
        }
        $set = $set. join(',', $fields);

        $sql = sprintf(
            "UPDATE `%s` %s WHERE id = %d LIMIT 1", $this->table, $set, $this->id
        );

        $result = (int)DB::update($sql);

        if ($this->sql_debug) {
            Log::info(__METHOD__. " result:{$result} sql: {$sql}");
        }

        return $result;
    }

    protected static function getCustomTableName() {
        return '';
    }

    public static function getTableName() {
        if (!($table_name = static::getCustomTableName())) {
            $class_name = static::class;
            $table_name = strtolower(substr($class_name, strrpos($class_name, "\\") + 1));
        }
        return $table_name;
    }

    public static function get($id) {

        $entity = new static();

        $row = DB::getRow(
            sprintf("SELECT * FROM `%s` WHERE id = %d", self::getTableName(), $id)
        );

        if (!$row) {
            return $entity;
        }

        foreach ($row as $key => $value) {
            $entity->originals[$key] = $value;
            $entity->attributes[$key] = $value;
        }

        return $entity;
    }

    public static function getList($filter=[]) {

        $sql = sprintf("SELECT * FROM `%s`", self::getTableName());
        if (($where_str = DB::parseFilters($filter))) {
            $sql .= ' WHERE '. $where_str;
        }

        return DB::getRows($sql);
    }

    public static function getListＷithPage(&$total, $filter=[], $page=1) {

        $sql = sprintf("SELECT * FROM `%s`", self::getTableName());
        if (($where_str = DB::parseFilters($filter))) {
            $sql .= ' WHERE '. $where_str;
        }

        Log::info(__METHOD__. " sql:". $sql);
        $total = DB::getTotal($sql);

        $limit = DB::PAGE_SIZE;
        $offset = max(0, ($page - 1)) * $limit;

        $sql .= " limit {$offset}, {$limit}";

        return DB::getRows($sql);
    }
}