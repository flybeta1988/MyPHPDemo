<?php

include_once __DIR__. '/QuackBehvior.php';

class Quacks implements QuackBehvior {

    public function quack() {
        echo '嘎嘎叫...';
    }
}