<?php

class ReflectionUtil {

    static function getClassSource(ReflectionClass $refClass) {

        $path = $refClass->getFileName();

        $lines = @file($path);

        $from = $refClass->getStartLine();

        $to = $refClass->getEndLine();

        $lenth = $to - $from + 1;

        return implode(array_slice($lines, $from-1, $lenth));
    }
}

require_once __DIR__."/../OOP/Animal.php";

$animalClass = new ReflectionClass('Animal');

$result = ReflectionUtil::getClassSource($animalClass);

print $result;