<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-3-28
 * Time: 下午3:14
 */

class foo {

    private $a;
    public $b = 1;
    public $c;
    private $d;
    static $e;
    public $f;

    static $s;

    public function setF($f) {
        $this->f = $f;
    }

    public function getProperty() {
        return get_object_vars($this);
    }

    public function test() {
        print_r(get_object_vars($this));
    }

    function f111($a) {
        TimeLogger::info('aaaa');
        usleep(300);
        $rows = array(
            array('msg' => 'aaa', 'mseconds' => 100),
            array('msg' => 'bbb', 'mseconds' => 200),
        );
        TimeCollector::add4Self(100);
        TimeCollector::add4Parent(__METHOD__, $rows);
    }

    function f11($a) {
        TimeLogger::info('bbb');
        usleep(300);
        $this->f111($a);
        $rows = array(
            array('msg' => 'aaa', 'mseconds' => 100),
            array('msg' => 'bbb', 'mseconds' => 200),
        );
        TimeCollector::add4Self(100);
        TimeCollector::add4Parent(__METHOD__, $rows);
    }

    function f22($a) {
        usleep(300);
        $rows = array(
            array('msg' => 'aaa', 'mseconds' => 100),
            array('msg' => 'bbb', 'mseconds' => 200),
        );
        TimeCollector::add4Self(100);
        TimeCollector::add4Parent(__METHOD__, $rows);
    }
    
    function f1($a) {
        TimeLogger::info('c');
        $start_time = microtime(true);
        $this->f11($a);
        usleep(100);
        $end_time = microtime(true);

        TimeCollector::add4Self(round(($end_time - $start_time)*1000, 3));
        TimeCollector::add4Parent(__METHOD__, [array('msg' => 'ccc', 'mseconds' => 100)]);
    }

    function f2($a) {
        $start_time = microtime(true);
        $this->f22($a);
        usleep(100);
        $end_time = microtime(true);

        TimeCollector::add4Self(round(($end_time - $start_time)*1000, 3));
        TimeCollector::add4Parent(__METHOD__, [array('msg' => 'ccc', 'mseconds' => 100)]);
    }
    
    function t() {
        TimeLogger::$start_trace_func = __METHOD__;
        //TimeCollector::$id = __METHOD__. '_'. date('YmdHis');
        $this->f1(111);
        //TimeCollector::add4Self(100);
        TimeCollector::print();
    }
}

class TimeLogger {

    static $start_trace_func;

    public static function info($msg) {
        $steps = 0;
        foreach (debug_backtrace() as $trace) {
            if ($trace['class']. '::'. $trace['function'] == self::$start_trace_func) {
                break;
            }
            $steps ++;
        }
        $prefix = str_repeat('-', $steps);
        echo $prefix. '>'. $msg. "\n";
    }
}

class TimeCollector {

    static $id;
    static $print_child = 1;
    static $collector_times;

    private static function getFunctionName($level) {
        $times = [];
        $traces = debug_backtrace();
        $max = sizeof($traces);
        for ($i = $max - 1; $i >= 0; $i--) {
            if (!isset($traces[$i])) {
                break;
            }
        }
        print_r($traces);die();
        $trace = $traces[$level + 1] ?? [];
        return $trace['class']. '::'. $trace['function']; 
    }

    public static function add4Self($mseconds) {
        if (!self::$id) {
            return false;
        }
        self::$collector_times[self::getFunctionName(1)]['total'] = $mseconds;
    }

    public static function add4Parent($child_func, array $childs) {
        if (!self::$id) {
            return false;
        }
        self::$collector_times[self::getFunctionName(2)]['childs'][$child_func] = $childs;
    }

    private static function output($msg) {
        echo $msg. "\n";
    }

    public static function print() {
        print_r(self::$collector_times);die();
        if (!self::$id) {
            $msg = "TimeCollecter ID undefined !\n";
            self::output($msg);
            return false;
        }

        $loop = 0;
        foreach (self::$collector_times as $func => $time) {

            $str = self::$id. ": [{$loop}]func {$func} total time: ". $time['total']. " ms";
            self::output($str);

            $loop ++;

            if (empty($time['childs']) || !self::$print_child) {
                continue;
            }

            foreach ($time['childs'] as $key => $child) {
                self::output(self::$id. ": |-> {$key} msg: {$child['msg']} time: {$child['mseconds']} ms");
            }
        }
    }
}

$foo = new foo();
$foo->t();
// $foo->setF(0.01);
// var_dump($foo->getProperty());
//$foo->test();
