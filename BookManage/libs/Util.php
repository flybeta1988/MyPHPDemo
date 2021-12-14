<?php

class Util
{
    public static function redirect($url, $msg="") {
        header("Location: {$url}");
        exit();
    }
}