<?php
namespace App\Libs;

class AutoLoader
{
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

        $pos = strrpos($class_name, "\\") + 1;

        $filename = substr($class_name, $pos);

        if (self::isControllerClass($class_name)) {
            $file_path = realpath(CONTROLLERS_DIR. $filename. ".php");
        } else if (self::isModelClass($class_name)) {
            $file_path = realpath(MODELS_DIR. $filename. ".php");
        } else if (self::isLibClass($class_name)) {
            $file_path = LIBS_DIR. $filename. ".php";
        } else if (self::isTraitClass($class_name)) {
            $file_path = TRAITS_DIR. $filename. ".php";
        } else if (self::isExceptionClass($class_name)) {
            $file_path = EXCEPTIONS_DIR. $filename. ".php";
        }

        return $file_path;
    }

    private static function isControllerClass($class_name) {
        return false !== strpos($class_name, 'Controllers');
    }

    private static function isModelClass($class_name) {
        return false !== strpos($class_name, 'Models');
    }

    private static function isLibClass($class_name) {
        return false !== strpos($class_name, 'Libs');
    }

    private static function isTraitClass($class_name) {
        return false !== strpos($class_name, 'Traits');
    }

    private static function isExceptionClass($class_name) {
        return false !== strpos($class_name, 'Exceptions');
    }
}

include_once LIBS_DIR. "/SmartyFilter.php";

spl_autoload_register(array('App\Libs\AutoLoader', 'load'));
