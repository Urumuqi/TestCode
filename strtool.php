<?php
/**
 * 数组，字符串测试工具.
 *
 * @author wq <yuri1308960477@gmail.com>
 */

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
// $num = 120.245;
// $num2 = sprintf('%d', $num * 100) / 100;
// echo 'num2 = ' . $num2 . PHP_EOL;

// $t = '2018-05-01 00:00:00--2018-06-01 00:00:00';
// $t1 = explode('--', $t);
// if (strtotime($t1[0]) >= strtotime('20180501')) {
//     echo 'new' . PHP_EOL;
// } else {
//     echo 'old' . PHP_EOL;
// }
// print_r($t1);
// $str = 'C043PA1190';
// $str_l = strtolower($str);
// echo ' lower case str = ' . $str_l . PHP_EOL;

// $t = 0.29;
// $t1 = sprintf('%d', $t * 100) / 100;
// var_dump($t1);
// var_export($t);

// $arr = array(
//     'A',
//     'a',
//     'B',
//     'c043pa1190'
// );
// $res = array_map(
//     function ($item) {
//         return strtoupper($item);
//     },
//     $arr
// );
// print_r($res);
// php bcmath 函数测试
// bcscale(20);
// $a = 23.223459;
// $b = 0.292348578;
// var_export($a);
// echo PHP_EOL;
// var_export($b);
// $add = bcadd($a, $b);
// var_dump($add);
// $isLarger = bccomp($a, $a);
// var_dump($isLarger);
// $r1 = bcdiv($a, $b);
// var_dump($r1);
// var_dump(bcmod(100, 3));
// var_dump(bcmul($a, $b));
// var_dump(bcpow(100, 2));

// $reg = '!^([^\:]+)\:([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)$!';
// $toMatch = 'controller.Index.index';
// $matches = array();
// preg_match($reg, $toMatch, $matches);
// var_dump($matches);
// $params = array(
//     'username' => 'shaz',
//     'token' => '113qwfr43r34t354t',
//     'key' => '中文'
// );
// $queryStr = http_build_query($params);
// var_dump($queryStr);
// $sql = "SELECT payment_channel, SUM(amount) AS `amount`
// FROM `mysql_jiedian`.`payment_order`
// WHERE status IN (1, 5, 6)
// 	AND success_time < 1527782400
// 	AND order_type = 'deposit'
// GROUP BY payment_channel";
// $p = array(
//     'db' => 'mysql_jiedian',
//     'sql' => $sql,
//     'username' => 'jd_finance',
//     'token' => 'bb9fe6a0-9e3d-423f-85d0-6b4be2b9a394',
//     'format' => 'json'
// );
// echo http_build_query($p) . PHP_EOL;
// $date = '20180601';
// $newDate = date('Ym01', strtotime('+1 month', strtotime($date)));
// echo $newDate . PHP_EOL;
// $month = '201804';
// echo date('Ymd', strtotime($month)) . PHP_EOL;
// echo 'date = ' . date('Y-m-d H:i:s', 1538841599) . PHP_EOL;
// $startTime = 1538841599;
// $monthEndTime = strtotime('2018-10-31 23:59:59');
// $endTime = 1541519999;
// $thisMonthDays = ($monthEndTime - $startTime) / 86400;
// echo 'this month : ' . $thisMonthDays . PHP_EOL;
// $nextMonthDays = ($endTime - $monthEndTime) / 86400;
// echo 'next month : ' . $nextMonthDays . PHP_EOL;
// $days = ($endTime - $startTime) / 86400;
// echo $days . PHP_EOL;
// 什么情况会出现一个月卡跨3个月使用， 月卡在下个月得剩余天数大于下月天数
// function getMonthDayCount($date)
// {
//     // 月末 - 月初
//     $monthEnd = date('Ymd', strtotime('+1 month -1 second', strtotime(date('Ym01', strtotime($date)))));
//     $monthStart = date('Ym01', strtotime($date));
//     return $monthEnd - $monthStart + 1;
// }
// $daysLeft = 30;
// $nextMonthDays = getMonthDays('20180720');
// echo $nextMonthDays . PHP_EOL;
// $startTime = strtotime('2018-01-01 00:00:00');
// $dateEndTime = strtotime('2018-01-01 23:59:59');
// $step = '+3 hours';
// while ($startTime < $dateEndTime) {
//     $endTime = strtotime($step, $startTime);
//     echo date('Y-m-d H:i:s', $startTime) . '_' . date('Y-m-d H:i:s', $endTime) . PHP_EOL;
//     $startTime = $endTime;
// }
// echo strtotime('2018-09-01') .  PHP_EOL;
// echo date('Y-m-d H:i:s', 1534902586) . PHP_EOL;

// $images = [
//     'http://zss-mmj.oss-cn-shenzhen.aliyuncs.com/activity_images/banner4.png',
//     'http://zss-mmj.oss-cn-shenzhen.aliyuncs.com/activity_images/banner3.png',
//     'http://zss-mmj.oss-cn-shenzhen.aliyuncs.com/activity_images/banner2.png'
// ];
// $json = json_encode($images);
// echo $json . PHP_EOL;

// $ss = array(
//     0, 2, 3, 10, 100
// );
// $t = max($ss);
// var_dump($t);$images = [
//     'http://zss-mmj.oss-cn-shenzhen.aliyuncs.com/activity_images/banner4.png',
//     'http://zss-mmj.oss-cn-shenzhen.aliyuncs.com/activity_images/banner3.png',
//     'http://zss-mmj.oss-cn-shenzhen.aliyuncs.com/activity_images/banner2.png'
// ];
// $json = json_encode($images);
// echo $json . PHP_EOL;
// $uid = 1000016;
// $o = $uid % 512;
// echo $o . PHP_EOL;

// $t = array(
//     'code1' => 'name1',
//     'code2' => 'name2',
//     'code3' => 'name3'
// );
// $r = array_map(function ($k, $v) {
//     return array(
//         'code' => $k,
//         'name' => $v,
//     );
// }, $t);
// var_dump($r);

// 应收明细订单明细
// 售卖充电宝

// $str = '2018091323233200070000000001';
// echo strlen($str) . PHP_EOL;
// $tarray = array(
//     'period' => 10,
//     'frequency' => 5,
//     'block' => true,
// );
// $tstr = json_encode($tarray);

// $tr = (array) json_decode($tstr, true);
// var_dump($tr);

// $p = array(
//     'username' => 'admin1@ankerbox.com',
//     'password' => 'Test123456',
// );
// echo json_encode($p) . PHP_EOL;

// $t = localeconv();
// var_dump($t);

$t = '2018/10/10';
echo date('Y-m-d', strtotime($t)) . PHP_EOL;
