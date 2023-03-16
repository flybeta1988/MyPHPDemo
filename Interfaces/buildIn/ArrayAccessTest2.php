<?php

/**
 * 提供像访问数组一样访问对象的能力的接口
 * Class ArrayAccessTest
 */
class ArrayAccessTest2 {

    public $attributes;

    protected $address;

    public function __construct() {
        $this->attributes = array(
            'id' => 100,
            'name' => "测试课程",
        );
        $this->address = 'Beijing';
    }

    public function __get($key) {
        echo "aa\n";
        return $this->address;
        return $this->attributes[$key];
    }
}

$aat = new ArrayAccessTest2();
var_dump($aat->address);