<?php
namespace App\Libs;

class Util
{
    public static function redirect($url, $msg="") {
        header("Location: {$url}");
        exit();
    }
}