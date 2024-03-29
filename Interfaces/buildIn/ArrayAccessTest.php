<?php

/**
 * 提供像访问数组一样访问对象的能力的接口
 * Class ArrayAccessTest
 */
class ArrayAccessTest
{
    private $attributes;

    public $address;

    public function __construct() {
        $this->address = 'ShangHai';
        $this->attributes = array(
            'id' => 100,
            'name' => "测试课程",
        );
    }

    private function setAttribute($key, $value) {
        $this->attributes[$key] = $value;
        $this->$key = $value;
    }

    private function getAttribute($key) {
        return $this->$key;
        return $this->attributes[$key];
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return ! is_null($this->getAttribute($offset));
    }

    /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->getAttribute($offset);
    }

    /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->setAttribute($offset, $value);
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }
}

$aat = new ArrayAccessTest();
foreach ($aat as $key => $a) {
    var_dump($key, $a);
}