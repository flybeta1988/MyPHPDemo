<?php
namespace App\Models;

use App\Libs\DB;

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
        $this->attributes["price"] = 0.00;
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

    private static function extend4List(&$books) {

        $cids = array_filter(array_column($books, 'cid'));
        $cates = Category::getListByIdList($cids);

        $sids = array_filter(array_column($books, 'sid'));
        $shelfList = BookShelf::getList([['id', 'IN', join(',', $sids)]]);
        $shelfs = array_column($shelfList, null, 'id');

        foreach ($books as &$book) {
            $book->shelf = $shelfs[$book->sid] ?? null;
            $book->category = $cates[$book->cid] ?? null;
        }
    }

    public static function getListＷithPage(&$total, $filter=[], $page=1) {

        if (!($books = parent::getListＷithPage($total, $filter, $page))) {
            return $books;
        }

        self::extend4List($books);

        return $books;
    }

    public static function getStatNumByXidList(array $xid_list, $group_field='sid') {
        if (empty($xid_list)) {
            return [];
        }
        $sql = sprintf(
            "SELECT %s, COUNT(1) AS num FROM `%s` WHERE ISNULL(dtime) AND %s IN (%s) GROUP BY %s",
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

    public static function lendOut($book_id) {
        if (!$book_id || !($book = Book::get($book_id))) {
            return false;
        }
        $book->status = Book::STATUS_LENT;
        return $book->save();
    }

    public static function returnBack($book_id) {
        if (!$book_id || !($book = Book::get($book_id))) {
            return false;
        }
        $book->status = Book::STATUS_FREE;
        return $book->save();
    }
}