<?php
namespace App\Models;

use App\Libs\DB;

class Base
{
    protected $table;

    protected $attributes = [];

    public function __construct() {
        $this->attributes["ctime"] = time();
    }

    public function __set(string $name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    protected function delete() {

    }

    public function save() {

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

        return DB::insert($sql);
    }

    private static function getTableName() {
        $class_name = static::class;
        return strtolower(substr($class_name, strrpos($class_name, "\\") + 1));
    }

    public static function get($id) {
        return DB::getRow(
            sprintf("SELECT * FROM `%s` WHERE id = %d", self::getTableName(), $id)
        );
    }

    public static function getList() {
        return DB::getRow(
            sprintf("SELECT * FROM `%s` WHERE id > 0", self::getTableName())
        );
    }
}