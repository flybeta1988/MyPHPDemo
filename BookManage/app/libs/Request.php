<?php
namespace App\Libs;

class Request
{
    private static $instance;

    public function __construct() {

    }

    public static function getInstance() {
        if (!is_null(self::$instance)) {
            return self::$instance;
        }
        self::$instance = new Request();
        return self::$instance;
    }

    public function get($key) {
        return $_REQUEST[$key] ?? null;
    }
}