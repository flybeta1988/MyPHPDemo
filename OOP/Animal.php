<?php
namespace OOP;

require_once __DIR__. "/Account.php";

class Animal
{
    protected $weight;

    protected $heigh;

    public $speed;

    public $account;

    public function __construct(\Account $account)
    {
        $this->account = $account;
    }

    public function __clone()
    {
        $this->account = clone $this->account;
    }

    public function run() {
        echo "I can run {$this->speed} km/h";
    }
}

$account = new \Account();
$dog1 = new Animal($account);

//$dog2 = $dog1;
$dog2 = clone $dog1;

$dog1->speed = 100;
$dog1->account->value = 111;
print_r($dog1);
print_r($dog2);

function date($str) {
    echo "this is date: {$str}";
}

echo date('Y-m-d');
