<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-3-28
 * Time: 下午3:14
 */

class foo {
    private $a;
    public $b = 1;
    public $c;
    private $d;
    static $e;
    public $f;

    public function setF($f) {
        $this->f = $f;
    }

    public function getProperty() {
        return get_object_vars($this);
    }

    public function test() {
        print_r(get_object_vars($this));
    }
}

$foo = new foo();
$foo->setF(0.01);
var_dump($foo->getProperty());
//$foo->test();
