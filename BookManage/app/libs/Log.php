<?php

namespace App\Libs;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    private static $instance;

    private static function getInstance() {
        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        $log = new Logger("test");

        $logfile = LOGS_DIR.'dev.log';
        if (!file_exists($logfile)) {
            touch($logfile);
        }

        $stream = new StreamHandler($logfile);

        $formatter = new LineFormatter(
            "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n",
            "Y-m-d H:i:s.u"
        );

        $stream->setFormatter($formatter);
        $log->pushHandler($stream);

        /*$firephp = new FirePHPHandler();
        self::$instance->pushHandler($firephp);*/

        self::$instance = $log;
        return self::$instance;
    }

    public static function info($msg) {
        self::getInstance()->info($msg);
    }

    public static function warning($msg) {
        self::getInstance()->warning($msg);
    }

    public static function error($msg) {
        self::getInstance()->error($msg);
    }
}