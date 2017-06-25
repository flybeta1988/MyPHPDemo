<?php

//require_once __DIR__."/../vendor/autoload.php";

//use OOP\Animal;

spl_autoload_register(function ($className) {
    var_dump($className);
    $file = __DIR__."/../OOP/{$className}.php";
    var_dump($file);
    if (file_exists($file)) {
        echo "Yes \n";
    }
    require_once $file;
});

var_dump(get_included_files());

/*$animal = new Animal();
var_dump($animal);*/