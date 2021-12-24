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

    public static function getListＷithPage(&$total, $filter=[], $page=1) {
        $shelfs = parent::getListＷithPage($total, $filter, $page);
        Category::extendCategory($shelfs);
        return $shelfs;
    }
}