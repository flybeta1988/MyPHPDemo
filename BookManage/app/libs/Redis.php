<?php
namespace App\Libs;

use Predis\Client;

class Redis
{
    private static $instance;

    public static function getInstance() {
        if (!is_null(self::$instance)) {
            return self::$instance;
        }
        return new Client();
    }
}