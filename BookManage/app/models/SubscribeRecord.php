<?php
namespace App\Models;

use App\Libs\DB;

class SubscribeRecord extends Base
{
    protected $table = 'subscribe_record';

    const STATUS_NORMAL = 0; //待处理
    const STATUS_RETURN = 1; //已通知

    public function __construct()
    {
        $this->attributes["book_id"] = 0;
        $this->attributes["reader_uid"] = 0;
        $this->attributes["admin_uid"] = 0;
        $this->attributes["status"] = self::STATUS_NORMAL;
        parent::__construct();
    }

    protected static function getCustomTableName() {
        return 'subscribe_record';
    }

    private static function getStatusStrByInt($status) {
        $data = array(
            self::STATUS_NORMAL => '待处理',
            self::STATUS_RETURN => '已处理',
        );
        return $data[$status] ?? '未知';
    }

    private static function extend4List(array &$records) {

        $admins = $readers = $books = [];
        if (($admin_ids = array_filter(array_column($records, 'admin_uid')))) {
            $adminList = User::getList([['id', 'IN', join(',', $admin_ids)]]);
            $admins = array_column($adminList, null, 'id');
        }

        if (($reader_ids = array_filter(array_column($records, 'reader_uid')))) {
            $adminList = User::getList([['id', 'IN', join(',', $reader_ids)]]);
            $readers = array_column($adminList, null, 'id');
        }

        if (($book_ids = array_filter(array_column($records, 'book_id')))) {
            $bookList = Book::getList([['id', 'IN', join(',', $book_ids)]]);
            $books = array_column($bookList, null, 'id');
        }

        foreach ($records as &$record) {
            $record->status_str = self::getStatusStrByInt($record->status);
            $record->admin = $admins[$record->admin_uid] ?? [];
            $record->reader = $readers[$record->reader_uid] ?? [];
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

    public static function getStatNumByXidListReaderUid(array $xid_list, $reader_uid) {
        if (empty($xid_list)) {
            return [];
        }
        $group_field = 'book_id';
        $sql = sprintf(
            "SELECT `book_id`, COUNT(distinct id) AS num FROM `%s` WHERE ISNULL(dtime) AND %s IN (%s) AND reader_uid=%d GROUP BY `book_id`",
            self::getTableName(),
            $group_field,
            join(',', $xid_list),
            $reader_uid
        );
        if (!($rows = DB::getRows($sql))) {
            return [];
        }
        return array_column($rows, 'num', $group_field);
    }

    public static function getFirstByBookIdReaderUid($book_id, $reader_uid) {
        if (!$book_id || !$reader_uid) {
            return null;
        }
        return self::getFirst(array(
            ['book_id', '=', $book_id],
            ['reader_uid', '=', $reader_uid],
        ));
    }
}