<?php
/**
 * 测试脚本.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

$p = [
    0 => [
        'question' => '你希望参加什么类型的活动？',
        'placeholder' => '你想参加什么类型的活动',
        'answer' => '',
    ],
];
echo json_encode($p, JSON_UNESCAPED_UNICODE), PHP_EOL;
