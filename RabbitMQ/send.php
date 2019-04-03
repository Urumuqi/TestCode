<?php
/**
 * publisher.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$host = '';
$port = 5672;
$user = 'admin';
$passwd = 'f1zzb4ck';

// connection
$conn = new AMQPStreamConnection($host, $port, $user, $passwd);
$channel = $conn->channel();

$channel->queue_declare('hello', false, false, false, false);

// send
$cnt = 100000;
while ($cnt > 0) {
    $msg = new AMQPMessage('Hello, RabbitMQ! counter = ' . $cnt);
    $channel->basic_publish($msg, '', 'hello');
    echo '[x] sent "Hello, RabbitMQ!" count = ' . $cnt . PHP_EOL;;
    $cnt --;
}

// close connection
$channel->close();
$conn->close();

