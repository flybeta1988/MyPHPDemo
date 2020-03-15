<?php
namespace OOP;

include_once __DIR__. "/../Util/Util.php";

class Animal
{
    protected $weight;

    protected $heigh;

    public $speed;

    public function run() {
        echo "I can run {$this->speed} km/h";
    }
}

function date($str) {
    echo "this is date: {$str}";
}


$a = new Animal();
//$a->speed = 100;
$r = \Util::getElement($a, 'c');
var_dump($r);