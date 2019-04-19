<?php
/**
 * Receiver.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

$host = '';
$port = 5672;
$user = 'admin';
$passwd = 'f1zzb4ck';

// connection
$connection = new AMQPStreamConnection($host, $port, $user, $passwd);
$channel = $connection->channel();

$exchange = 'delayed_exchange';
$queue = 'delayed_queue';

// $channel->queue_declare($queue, false, false, false, false);
/**
 * Declares queue, creates if needed
 *
 * @param string $queue
 * @param bool $passive
 * @param bool $durable
 * @param bool $exclusive
 * @param bool $auto_delete
 * @param bool $nowait
 * @param null $arguments
 * @param null $ticket
 * @return mixed|null
 */
$channel->queue_declare($queue, false, false, false, false, false, new AMQPTable(array(
    "x-dead-letter-exchange" => "delayed"
)));

echo " [*] Waiting for messages. To exit press CTRL+C" . PHP_EOL;

$callback = function (AMQPMessage $msg) {
    var_dump($msg);
    // $headers = $msg->get('application_headers');
    // $nativeData = $headers->getNativeData();
    // var_dump($nativeData['x-delay']);
    // $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    // echo '[x] Received ', $msg->body, PHP_EOL;
};

// consume
$channel->basic_consume($queue, '', false, true, false, false, $callback);

/**
 * @param \PhpAmqpLib\Channel\AMQPChannel $channel
 * @param \PhpAmqpLib\Connection\AbstractConnection $connection
 */
function shutdown($channel, $connection)
{
    $channel->close();
    $connection->close();
}

register_shutdown_function('shutdown', $channel, $connection);

while (count($channel->callbacks)) {
    $channel->wait();
}
