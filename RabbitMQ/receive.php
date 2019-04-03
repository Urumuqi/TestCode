<?php
/**
 * Receiver.
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
$connection = new AMQPStreamConnection($host, $port, $user, $passwd);
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);

echo " [*] Waiting for messages. To exit press CTRL+C" . PHP_EOL;

$callback = function ($msg) {
    echo '[x] Received ', $msg->body, PHP_EOL;
};

// consume
$channel->basic_consume('hello', '', false, true, false, false, $callback);

while (count($channel->callbacks)) {
    $channel->wait();
}
