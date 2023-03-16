<?php

class Animal
{
    public $heigh = 10;

    public $speed = 100;

    public $weight = 200;
}

$animal = new Animal();

if ($animal instanceof Animal) {
    echo "Yes\n";
} else {
    echo "No\n";
}

foreach ($animal as $key => $value) {
    echo $key. ' => '. $value. "\n";
}