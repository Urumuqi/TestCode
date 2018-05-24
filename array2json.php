<?php
/**
 * PHP TEST.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

$msg = array(
    'order_primary' => 1234, // 订单主键
    'order_type' => 0, // 0营收,1扣款
    'pay_amount' => 2900, // 订单营收
    'store_id' => '00051b95-e210-48e6-924a-81aabef68935',
    'provider_id' => '0267a83b-ea4a-488e-8944-f578c96a8d71',
    'provider_type' => 0, // 0渠道,1直营BD,2代理商
    'pay_time' => '1520333612', // 付款时间
    'start_time' => '1520333612', // 订单开始时间
    'end_time' => '1520333612', // 订单结束时间
    'up_time' => '1520333612', // 订单更新时间
);

// echo json_encode($msg) . PHP_EOL;

$statementDetail = array(
    'statement_id' => 'QD1708290002',
    'category' => 'order_cps',
    'role' => 'qd',
    'pageSize' => '20',
    'pageNum' => '1'
);
// echo json_encode($statementDetail) . PHP_EOL;
$now = '20180301';
// echo date('Y-m-d', strtotime('-1 day', strtotime($now))) . PHP_EOL;
$a = 'new string';
$b = &$a;
xdebug_debug_zval('a');
unset($a);
xdebug_debug_zval('a');
xdebug_debug_zval('b');
