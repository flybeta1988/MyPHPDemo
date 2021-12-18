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
}