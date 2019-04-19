<?php
/**
 * delayed message.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

// rabbitMQ delayed message
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

$rabbitConfig = Yii::$app->params['rabbit_mq']['default'];

$conn = new AMQPStreamConnection($rabbitConfig['host'], $rabbitConfig['port'], $rabbitConfig['user'], $rabbitConfig['password']);
$channel = $conn->channel();
$exchange = 'delayed_exchange';
$queue = 'delayed_queue';

/**
 * Declares exchange
 *
 * @param string $exchange
 * @param string $type
 * @param bool $passive
 * @param bool $durable
 * @param bool $auto_delete
 * @param bool $internal
 * @param bool $nowait
 * @return mixed|null
 */
$channel->exchange_declare($exchange, 'x-delayed-message', false, true, false, false, false, new AMQPTable(array(
    "x-delayed-type" => AMQPExchangeType::FANOUT
)));

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

// bind queue and exchange
$channel->queue_bind($queue, $exchange);

// 消息内容
$msgContent = [
    'status' => 1,
    'ttl' => '5s',
    'msg' => [
        'name' => 'delayed message',
        'value' => 'delayed message'
    ]
];

// delay 10s
$delayConfig = [
    'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
    'application_headers' => new AMQPTable([ // 延时配置
        'x-delay' => 10000
    ])
];

$msg = new AMQPMessage(json_encode($msgContent), $delayConfig);

$channel->basic_publish($msg, $exchange);

$channel->close();
$conn->close();
