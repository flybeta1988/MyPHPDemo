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

    public function isPostMethod() {
        return 'POST' == $_SERVER['REQUEST_METHOD'];
    }

    public function get($key) {
        return $_REQUEST[$key] ?? null;
    }

    public function all() {
        return $_REQUEST;
    }
}