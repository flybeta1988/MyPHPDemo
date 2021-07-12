<?php
namespace OOP;

include_once __DIR__. "/../Util/Util.php";
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