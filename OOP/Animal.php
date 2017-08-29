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