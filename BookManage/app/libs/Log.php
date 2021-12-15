<?php

namespace App\Libs;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    private static $instance;

    private static function getInstance() {
        if (!is_null(self::$instance)) {
            return self::$instance;
        }
        self::$instance = new Logger("test");
        self::$instance->pushHandler(new StreamHandler(LOGS_DIR.'/dev.log', Logger::WARNING));
        return self::$instance;
    }

    public static function info($msg) {
        self::getInstance()->info($msg);
    }
}