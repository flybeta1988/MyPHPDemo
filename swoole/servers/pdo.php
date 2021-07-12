<?php
declare(strict_types=1);

//Swoole\Runtime::enableCoroutine($flags = SWOOLE_HOOK_ALL);
//Co::set(['hook_flags'=> SWOOLE_HOOK_ALL]); // v4.4+版本使用此方法。

use Swoole\Coroutine;
use Swoole\Database\PDOConfig;
use Swoole\Database\PDOPool;
use Swoole\Runtime;

const N = 1024;

Runtime::enableCoroutine();
$s = microtime(true);
Coroutine\run(function () use (&$result) {
    $pool = new PDOPool((new PDOConfig)
        ->withHost('127.0.0.1')
        ->withPort(3306)
        ->withDbName('xnw')
        ->withCharset('utf8mb4')
        ->withUsername('root')
        ->withPassword('root')
    );
    Coroutine::create(function () use ($pool, &$result) {
        $pdo = $pool->get();
        $statement = $pdo->query("select * from org_course order by id desc limit 10");
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $pool->put($pdo);
    });
});
$s = microtime(true) - $s;
echo 'Use ' . $s . 's for ' . N . ' queries' . PHP_EOL;
print_r($result);
