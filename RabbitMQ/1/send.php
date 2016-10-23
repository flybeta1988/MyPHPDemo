<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 16-10-22
 * Time: 下午10:57
 */
require_once __DIR__ . '/../../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

for ($i=1;$i<100;$i++){
    sleep(1);
    $msg = new AMQPMessage('Hello World ='. $i .'= !');
    $channel->basic_publish($msg, '', 'hello');

    echo " [x] Sent 'Hello World =' .$i. '= !'\n";
}

$channel->close();
$connection->close();
