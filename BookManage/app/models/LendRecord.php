<?php
namespace App\Models;

use App\Libs\DB;

class LendRecord extends Base
{
    protected $table = 'lend_record';

    const STATUS_NORMAL = 0; //借出
    const STATUS_RETURN = 1; //已还
    const STATUS_EXPIRED = 2; //过期

    const ROLE_NORMAL = 0; //普通
    const ROLE_ADMIN = 1; //管理员

    public function __construct()
    {
        $this->attributes["book_id"] = 0;
        $this->attributes["reader_id"] = 0;
        $this->attributes["uid"] = 0;
        $this->attributes["start_time"] = 0;
        $this->attributes["end_time"] = 0;
        $this->attributes["return_time"] = 0;
        $this->attributes["status"] = self::STATUS_NORMAL;
        parent::__construct();
    }

    protected static function getCustomTableName() {
        return 'lend_record';
    }

    private static function getStatusStrByInt($status) {
        $data = array(
            self::STATUS_NORMAL => '已借出',
            self::STATUS_RETURN => '已归还',
            self::STATUS_EXPIRED => '已过期',
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

    private static function extend4List(array &$records) {

        $admin_ids = array_filter(array_column($records, 'uid'));
        $adminList = User::getList([['id', 'IN', join(',', $admin_ids)]]);
        $admins = array_column($adminList, null, 'id');

        $reader_ids = array_filter(array_column($records, 'reader_id'));
        $adminList = User::getList([['id', 'IN', join(',', $reader_ids)]]);
        $readers = array_column($adminList, null, 'id');

        $book_ids = array_filter(array_column($records, 'book_id'));
        $bookList = Book::getList([['id', 'IN', join(',', $book_ids)]]);
        $books = array_column($bookList, null, 'id');

        foreach ($records as &$record) {
            $record->status_str = self::getStatusStrByInt($record->status);
            $record->admin = $admins[$record->uid] ?? [];
            $record->reader = $readers[$record->reader_id] ?? [];
            $record->book = $books[$record->book_id] ?? [];
        }
    }

    public static function getListＷithPage(&$total, $filter=[], $page=1) {

        if (!($records = parent::getListＷithPage($total, $filter, $page))) {
            return $records;
        }

        self::extend4List($records);

        return $records;
    }

    public static function getStatNumByXidList(array $xid_list, $group_field='reader_id') {
        if (empty($xid_list)) {
            return [];
        }
        $sql = sprintf(
            "SELECT %s, COUNT(distinct book_id) AS num FROM `%s` WHERE ISNULL(dtime) AND %s IN (%s) GROUP BY %s",
            $group_field,
            self::getTableName(),
            $group_field,
            join(',', $xid_list),
            $group_field
        );
        if (!($rows = DB::getRows($sql))) {
            return [];
        }
        return array_column($rows, 'num', $group_field);
    }
}