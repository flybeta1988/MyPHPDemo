<?php
namespace App\Models;

class BookShelf extends Base
{
    protected $table = 'book_shelf';

    public function __construct()
    {
        $this->attributes["name"] = '';
        $this->attributes["cid"] = 0;
        $this->attributes["uid"] = 0;
        parent::__construct();
    }

    protected static function getCustomTableName() {
        return 'book_shelf';
    }

    private static function extend4List(&$shelfs) {

        $ids = array_filter(array_column($shelfs, 'id'));
        $cids = array_filter(array_column($shelfs, 'cid'));

        $cates = Category::getListByIdList($cids);
        $stats = Book::getStatNumByXidList($ids);

        foreach ($shelfs as &$shelf) {
            $shelf->book_num = $stats[$shelf->id] ?? 0;
            $shelf->category = $cates[$shelf->cid] ?? null;
        }
    }

    public static function getListＷithPage(&$total, $filter=[], $page=1) {
        $shelfs = parent::getListＷithPage($total, $filter, $page);
        self::extend4List($shelfs);
        return $shelfs;
    }

    public static function getFirstByName($name) {

    }
}