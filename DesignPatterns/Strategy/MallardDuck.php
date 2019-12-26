<?php

include_once __DIR__. '/Duck.php';
include_once __DIR__. '/Quacks.php';
include_once __DIR__. '/FlyWithWings.php';

class MallardDuck extends Duck {

    public function display() {
        echo "这是一只绿头Duck!";
    }

}