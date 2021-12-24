<?php
namespace App\Libs;

class Response
{
    private function __construct() {

    }

    public static function ok($msg, $data=[]) {
        return array(
            'code' => 0,
            'msg' => $msg ? $msg : '获取成功',
            'data' => $data
        );
    }

    public static function fail($msg) {
        return array(
            'code' => 1,
            'msg' => $msg ? $msg : '获取失败',
            'data' => []
        );
    }

    public static function exitJson(array $arr) {
        exit(json_encode($arr));
    }

    public static function exitJsonOk($data=[], $msg='') {
        exit(
            json_encode(self::ok($msg, $data))
        );
    }

    public static function exitJsonFail($data=[], $msg='') {
        exit(
            json_encode(self::fail($msg, $data))
        );
    }

    public static function exitException(\Exception $e) {
        exit(
            json_encode(
                array(
                    'code' => 1,
                    'msg' => $e->getMessage() ?? '系統异常',
                    'data' => []
                )
            )
        );
    }
}