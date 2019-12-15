<?php
namespace OOP;

class Animal
{
    protected $weight;

    protected $heigh;

    protected $speed;

    public function run() {
        echo "I can run {$this->speed} km/h";
    }
}

function date($str) {
    echo "this is date: {$str}";
}

echo date('Y-m-d');