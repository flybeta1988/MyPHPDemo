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

    public static function extendCategory(array $entitys) {
        $cids = array_filter(array_column($entitys, 'cid'));
        $categorys = Category::getList([['id', 'IN', join(',', $cids)]]);
        $cates = array_column($categorys, null, 'id');
        foreach ($entitys as $entity) {
            $entity->category = $cates[$entity->cid] ?? null;
        }
    }
}