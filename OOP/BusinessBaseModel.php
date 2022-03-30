<?php
include_once "../Util/Util.php";

abstract class BusinessBaseModel
{
    public function __set($name, $value) {
        throw new Exception("业务模型禁止增加未知属性");
    }

    public function __get($name) {
        throw new Exception("业务模型禁止获取未知属性");
    }

    public function toArray() {
        return $this->processArray(get_object_vars($this));
    }

    private function processArray($array) {
        $rows = [];
        foreach($array as $key => $value) {
            $key = Util::uncamelize($key);
            if (is_object($value)) {
                $rows[$key] = $value->toArray();
            }
            if (is_array($value)) {
                $rows[$key] = $this->processArray($value);
            }
            $rows[$key] = $value;
            unset($array[$key]);
        }
        return $rows;
    }
}