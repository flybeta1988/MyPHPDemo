<?php

abstract class BaseModel
{
    protected $table;

    protected $attributes;

    protected function save() {
        var_dump($this->table);
    }

    protected function delete() {

    }

    public function get() {
        var_dump($this->table);
        return 1;
    }

    protected function getList() {

    }
}