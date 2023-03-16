<?php
function myAutoLoad() {
    include_once __DIR__. "/../OOP/Animal.php";
}

spl_autoload_register('myAutoLoad');

$animal = new \OOP\Animal(new Account());
var_dump($animal);

$files = get_included_files();
var_dump($files);