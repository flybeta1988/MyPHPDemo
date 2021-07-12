<?php
use Swoole\Coroutine;
use Swoole\Database\PDOConfig;
use Swoole\Database\PDOPool;
use Swoole\Runtime;

class CourseService
{
    public static function getCourseList($channel) {
        Runtime::enableCoroutine();
        $pool = new PDOPool((new PDOConfig)
            ->withHost('127.0.0.1')
            ->withPort(3306)
            ->withDbName('xnw')
            ->withCharset('utf8mb4')
            ->withUsername('root')
            ->withPassword('root')
        );
        Coroutine::create(function () use ($pool, $channel) {
            $pdo = $pool->get();
            $statement = $pdo->query("select * from org_course order by id desc limit 10");
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $channel->push($result);
            $pool->put($pdo);
        });
    }

    public static function getCourseListV2() {
        try {
            $db = new PDO('mysql:host=localhost;port=6306;dbname=xnw', 'root', 'root');
        } catch (Exception $e) {
            die("mysql连接失败");
        }

        $stmt = $db->query("select * from org_course order by id desc limit 10");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}