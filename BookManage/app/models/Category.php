<?php
namespace App\Models;

class Category extends Base
{
    protected $table = 'category';

    public function __construct()
    {
        $this->attributes["name"] = '';
        $this->attributes["uid"] = 0;
        parent::__construct();
    }

    private static function extend4List(&$categorys) {

        $ids = array_filter(array_column($categorys, 'id'));

        $stats = Book::getStatNumByXidList($ids, 'cid');

        foreach ($categorys as &$category) {
            $category->book_num = $stats[$category->id] ?? 0;
        }
    }

    public static function getListByIdList($id_list) {
        $categorys = Category::getList([['id', 'IN', join(',', $id_list)]]);
        return array_column($categorys, null, 'id');
    }

    public static function getListＷithPage(&$total, $filter=[], $page=1) {
        $shelfs = parent::getListＷithPage($total, $filter, $page);
        self::extend4List($shelfs);
        return $shelfs;
    }
}