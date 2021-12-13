<?php

class AutoLoader
{
    const BASEDIR = __DIR__. "/../";

    public static function load() {

    }
}

spl_autoload_register(array('AutoLoader', 'load'));