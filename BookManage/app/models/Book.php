<?php
namespace App\Models;

class Book extends Base
{
    protected $table = 'book';

    const STATUS_FREE = 0; //空闲
    const STATUS_LENT = 1; //已借出
    const STATUS_OFF = 2; //已下架

    public function __construct()
    {
        $this->attributes["name"] = '';
        $this->attributes["isbn"] = '';
        $this->attributes["thumb"] = '';
        $this->attributes["sid"] = 0;
        $this->attributes["cid"] = 0;
        $this->attributes["uid"] = 0;
        $this->attributes["status"] = 0;

        parent::__construct();
    }

    public static function getStatusMsg($status) {
        $data = array(
            self::STATUS_FREE => '空闲',
            self::STATUS_LENT => '已借出',
            self::STATUS_OFF => '已下架',
        );
        return $data[$status] ?? '未知';
    }
}