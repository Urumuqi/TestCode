<?php
/**
 * 测试脚本.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

$jsonArr = [
    'marital_status' => 1,
    'job' => '架构师',
    'phone' => '18380447995',
    'self_desc' => 'do what u do love',
    'province' => '四川省',
    'city' => '成都市',
    'area' => '武侯区',
];
// echo json_encode(['province', 'city', 'area', 'marital_status', 'job', 'phone', 'self_desc']), PHP_EOL;
// array_walk($jsonArr, function ($item, $key) {
//     var_dump($item, $key);
// });

$t = 'aaaaa';
$b = '2222';

$t .= $b;

echo $t, PHP_EOL;
