<?php
include_once __DIR__. "/./Animal.php";

class People extends \OOP\Animal
{
    public $speed = 200;
}

$account = new Account();
$people = new People($account);
$people->run();