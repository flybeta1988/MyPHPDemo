<?php

if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', __DIR__. '/..');
}

class AutoLoader
{
    public static function load($class_name) {
        $class_path = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
        $class_file = ROOT_DIR. '/'. $class_path. '.php';
        if (!file_exists($class_file)) {
            var_dump($class_file. ' not found!');
            return false;
        }
        require_once $class_file;
    }
}

spl_autoload_register(array('AutoLoader', 'load'));