<?php
require_once __DIR__."/../OOP/Animal.php";

$animalClass = new ReflectionClass('Animal');
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

    print_r($details);
}
