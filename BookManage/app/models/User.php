<?php
namespace App\Models;

use App\Libs\DB;

class User extends Base
{
    protected $table = 'user';

    const STATUS_NORMAL = 0; //正常
    const STATUS_BLACK = 1; //拉黑

    const ROLE_NORMAL = 0; //普通
    const ROLE_ADMIN = 1; //管理员

    public function __construct()
    {
        $this->attributes["name"] = '';
        $this->attributes["password"] = '';
        $this->attributes["idcard"] = '';
        $this->attributes["money"] = 0.00;
        $this->attributes["address"] = '';
        $this->attributes["mobile"] = '';
        $this->attributes["role_id"] = self::ROLE_NORMAL;
        $this->attributes["status"] = self::STATUS_NORMAL;
        parent::__construct();
    }

    private static function getStatusStrByInt($status) {
        $data = array(
            self::STATUS_NORMAL => '正常',
            self::STATUS_BLACK => '拉黑',
        );
        return $data[$status] ?? '未知';
    }

    private static function getRoleStrByInt($role_id) {
        $data = array(
            self::ROLE_NORMAL => '普通',
            self::ROLE_ADMIN => '管理员',
        );
        return $data[$role_id] ?? '未知';
    }

    public static function getByNamePassword($name, $password) {
        return DB::getRow(
            sprintf("SELECT * FROM `%s` WHERE name = '%s' AND password='%s'", self::getTableName(), $name, $password)
        );
    }

    private static function extend4List(array &$users) {
        $reader_ids = array_filter(array_column($users, 'id'));
        $readStat = LendRecord::getStatNumByXidList($reader_ids);
        foreach ($users as $user) {
            $user->role_str = self::getRoleStrByInt($user->role_id);
            $user->status_str = self::getStatusStrByInt($user->status);
            $user->book_num = $readStat[$user->id] ?? 0;
        }
    }

    public static function getListＷithPage(&$total, $filter=[], $page=1) {

        if (!($users = parent::getListＷithPage($total, $filter, $page))) {
            return $users;
        }

        self::extend4List($users);

        return $users;
    }
}