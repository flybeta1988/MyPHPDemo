<?php

const BASE_DIR = __DIR__. "/..";
const CONFIG_DIR = BASE_DIR. "/configs";

class AutoLoader
{
    const LIBS_DIR = BASE_DIR. "/libs/";

    const MODELS_DIR = BASE_DIR. "/models/";

    const CONTROLLERS_DIR = BASE_DIR. "/controllers/";

    public static function load($class_name) {

        $file_path = self::getRealPath($class_name);

        $new_line_tag = ('cli' == PHP_SAPI) ? "\n" : "</br>";

        if (file_exists($file_path)) {
            include_once $file_path;
        } else {
            echo "include file:". $file_path. " not exist!". $new_line_tag;
        }
    }

    /**
     * @param $class_name
     * @return false|string
     */
    private static function getRealPath($class_name) {

        if (self::isControllerClass($class_name)) {
            $file_path = realpath(self::CONTROLLERS_DIR. $class_name. ".php");
        } else if (self::isModelClass($class_name)) {
            $file_path = realpath(self::MODELS_DIR. $class_name. ".php");
        } else {
            $file_path = realpath(self::LIBS_DIR. $class_name. ".php");
        }

        return $file_path;
    }

    private static function isControllerClass($class_name) {
        return 'Controller' == substr($class_name, -10);
    }

    private static function isModelClass($class_name) {
        return 'Model' == substr($class_name, -5);
    }
}

spl_autoload_register(array('AutoLoader', 'load'));