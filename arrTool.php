<?php

$reportParam = array(
    'from'               => 1, // const A_BORROW = 1;const A_RETURN = 2;const A_ORDER_DETAIL = 3;
    'order_number'       => '', // 订单号
    'uid'                => '', // 用户id
    'battery_id'         => '', // 电池id --
    'device_id'          => '', // 机柜id --
    'slot_seq'           => '', // 卡槽位置 --
    'business_id'        => '', // 门店id --
    'fault_type'         => 'other', // 异常类型,other,charger,cabinet
    'fault_arr'          => array('code' => 'name'), // 用户上报异常类型数组
    'fault_report'       => true, // 标识正常，异常上报,true 异常上报，false 正常上报 --
    'desc'               => '', // 用户描述 --
    'pic_info'           => [], //
    'time'               => time() // 用户上报时间
);

// 电池信息
$batteryBaseInfo = array(
    'uuid' => '',
    'type_id' => '',
    'sn' => '',
    'business_status' => '',
    'available_status' => '',
    'status' => '',
    'transaction_status' => '',
);

// echo json_encode($batteryBaseInfo) . PHP_EOL;

# 订单kafka配置， 指定版本参数
// group.id = "jiedian_slot_event_crm"
// api.version.request = "false"
// broker.version.fallback = "0.8.2.1"
// enable.auto.commit = "true"
// auto.commit.interval.ms = 1000
// auto.offset.reset = "error"
// offset.store.sync.interval.ms = 1000
// offset.store.method = "broker"

echo urlencode('www.mydreamplus.com/mdptimes/15362449789951') . PHP_EOL;