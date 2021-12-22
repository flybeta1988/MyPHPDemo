<?php
namespace App\Models;

class Book extends Base
{
    protected $table = 'book';

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
}