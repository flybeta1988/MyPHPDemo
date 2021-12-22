<?php
namespace App\Libs;

class Response
{
    private function __construct() {

    }

    private static function ok($msg, $data) {
        return array(
            'code' => 0,
            'msg' => $msg ? $msg : '获取成功',
            'data' => $data
        );
    }

    public static function exitJson($data, $msg='') {
        exit(
            json_encode(self::ok($msg, $data))
        );
    }
}