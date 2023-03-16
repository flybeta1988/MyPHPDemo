<?php
include_once __DIR__. "/./Animal.php";

class People extends \OOP\Animal
{
    public $speed = 200;

    public static function t1($i) {
        sleep(2);
        echo __METHOD__. " -> {$i}\n";
        return $i;
    }

    public function t2($i) {
        static $ids;
        if (isset($ids)) {
            echo "xxx{$i}\n";
            return $ids;
        }
        sleep(2);
        $ids = "1, 2, 3";
        return $ids;
    }
}

$account = new Account();
$people = new People($account);
$people->run();

static $t;
for ($i = 0; $i < 5; $i ++) {
    echo People::t2($i). "\n";
}
