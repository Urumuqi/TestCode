<?php
/**
 * RabbitMQ message content.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

/**
 * 每个运营商用一个topic.
 * 对发送到运营商的消息内容做以下格式约定.
 */
$msg = [
    'action' => '', // 操作类型
    'business_type' => '', // 业务类型
    'operator_code' => 'operator_code', // 服务商code
    'params' => [
        'key' => 'value',
        'key_2' => 'value'
    ],
];

echo json_encode($msg) . PHP_EOL;
