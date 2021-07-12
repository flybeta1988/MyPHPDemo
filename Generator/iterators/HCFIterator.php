<?php

class HCFIterator implements Iterator
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function current()
    {
        echo __METHOD__. " => 当前指针数据\n";
        return current($this->data). " >>>> 自定义遍历值";
    }

    public function next()
    {
        echo __METHOD__. " => 指针下移\n";
        next($this->data);
    }

    public function key()
    {
        echo __METHOD__. " => 返回当前数组键值\n";
        return key($this->data);
    }

    public function valid()
    {
        echo __METHOD__. " => 检查迭代指针是否正常\n";
        return current($this->data);
    }

    public function rewind()
    {
        echo __METHOD__. " => 指针重置\n";
        reset($this->data);
    }

}

$rows = array(
    'a' => 1,
    'b' => 2,
    'c' => 3,
);

$myIterator = new HCFIterator($rows);
foreach ($myIterator as $key => $value) {
    echo $key. ' => '. $value. "\n\n";
}