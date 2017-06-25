<?php

require_once __DIR__."/../vendor/autoload.php";

use OOP\Animal;

$animal = new Animal();
var_dump($animal);

$animalClass = new ReflectionClass('OOP\Animal');
//Reflection::export($animalClass);

function getClassData(ReflectionClass $refClass) {
    $details = array();

    $name = $refClass->getName();

    if ($refClass->isUserDefined()) {
        $details[] = "{$name} is user defined !";
    }

    if ($refClass->isInternal()) {
        $details[] = "{$name} is Internal !";
    }

    if ($refClass->isInstantiable()) {
        $details[] = "{$name} is instantiable !";
    }

    print_r($details);
}

getClassData($animalClass);