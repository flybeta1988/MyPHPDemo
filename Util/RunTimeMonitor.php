<?php

/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-3-1
 * Time: 上午10:08
 */
class RunTimeMonitor
{
    private static $start_time;
    private static $stop_time;

    public static function start() {
        self::$start_time = microtime(true);
    }

    public static function stop() {
        self::$stop_time = microtime(true);
    }

    public static function result() {
        return round(self::$stop_time - self::$start_time, 4);
    }

    public static function stopAndOutpu() {
        self::stop();
        print "\n#############################\n";
        print "共耗时：". self::result(). "秒";
        print "\n#############################\n";
    }
}

RunTimeMonitor::start();
sleep(1);
RunTimeMonitor::stop();

RunTimeMonitor::stopAndOutpu();
