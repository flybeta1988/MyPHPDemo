<?php
namespace App\Models;

class Book extends Base
{
    protected $table = 'book';

    public function __construct()
    {
        $this->attributes["name"] = "";
        $this->attributes["isbn"] = "";
        parent::__construct();
    }
}