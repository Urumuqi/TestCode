<?php

// $date = date('Y-m-d H:i:s');
// $newDate = date('Y-m-d H:i:s', strtotime('-3 month', strtotime($date)));
// echo $newDate . PHP_EOL;

// echo json_encode($p) . PHP_EOL;
// 佛山市承埔科技有限公司(中山市)
// 海南蜂窝科技有限公司(海口市)
// 佛山通路网络服务有限公司(佛山市)
// $sql = "SELECT store_id, online_time FROM bi_jiedian.dim_jiedian_store WHERE i_rep_date = 20180424 AND store_id IN ('0000031c-01bf-4a8c-a97d-78be5e4504e6', '00002c13-ab8b-4cb4-bdd9-886b6c4d9e8','00008371-c72e-4e38-831c-d546d95e816b')";
// $url = 'http://172.21.64.133:18011/hive/handleSqlApi?db=bi_jiedian&sql=' . urlencode($sql) . '&username=caiwu&token=bb9fe6a0-9e3d-423f-85d0-6b4be2b9a394&format=json';

// $curDate = '20180331';
// $beforeMonth = date('Ymd', strtotime('-1 month', strtotime($curDate)));
// echo 'current : ' . $curDate . ' | history : ' . $beforeMonth . PHP_EOL;

// visit_type_id = 2 鉴权拜访|3 不鉴权拜访 机柜类型的拜访
// template_id = 51 | 92
// 数字截断
$num = 120.245;
$num2 = sprintf('%d', $num * 100) / 100;
echo 'num2 = ' . $num2 . PHP_EOL;

