<?php
namespace App\Models;

use App\Libs\DB;

class User extends Base
{
    protected $table = 'user';

    const STATUS_NORMAL = 0;

    public function __construct()
    {
        $this->attributes["name"] = '';
        $this->attributes["password"] = '';
        $this->attributes["idcard"] = '';
        $this->attributes["address"] = '';
        $this->attributes["mobile"] = '';
        $this->attributes["role_id"] = 0;
        $this->attributes["status"] = self::STATUS_NORMAL;
        parent::__construct();
    }

    public static function getByNamePassword($name, $password) {
        return DB::getRow(
            sprintf("SELECT * FROM `%s` WHERE name = '%s' AND password='%s'", self::getTableName(), $name, $password)
        );
    }
}