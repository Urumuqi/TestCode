<?php
/**
 * 数组，字符串测试工具.
 *
 * @author wq <yuri1308960477@gmail.com>
 */

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
// // }
// echo strtotime('2018-09-01') .  PHP_EOL;
// echo date('Y-m-d H:i:s', 1534902586) . PHP_EOL;

// // 登陆密码
// $passwd = md5('admin' . 'admin');
// // 提现密码
// $withdraw = md5('admin' . 'admin');
// echo $passwd . PHP_EOL;

// // 测试商户号
// $merchantNo = 'S20170907011890';

// test call_user_func
// error_reporting(E_ALL);
// function increment(&$n)
// {
//     return $n ++;
// }

// function incrementa($n)
// {
//     return $n ++;
// }

// $a = 0;
// // call_user_func 不能用引用做参数
// $aa = call_user_func('increment', $a);
// echo '$a = ' . $a . ' $aa = ' . $aa . PHP_EOL;

// $a = 0;
// $aa = call_user_func('incrementa', $a);
// echo '$a = ' . $a . ' $aa = ' . $aa . PHP_EOL;

// $a = 1;
// // call_user_func_array 可以传递引用做参数
// call_user_func_array('increment', array(&$a));
// echo $a . PHP_EOL;

// $mac = 'f0:18:98:a2:2d:de';
// $mac = str_replace(':', '', $mac);
// $mac = strtoupper($mac);
// echo $mac . PHP_EOL;
// exit;

// /**
//  * 启动相机。
//  */
// $start = [
//     'action_id' => '拍摄号',
//     'camera_group_id' => '相机群',
// ];

// /**
//  * 启动相机返回接口
//  */
// $startReturn = [
//     'status' => 1, // 1成功，2繁忙，3失败（异常信息msg字段）
//     'msg'    => 'camera init success',
//     'action_id' => '拍摄号', // 拍摄号
// ];

// /**
//  * 相机拍摄结果 camera_progress
//  */
// $cameraProgress = [
//     'action_id' => '拍摄号',
//     'camera_group_id' => '相机群',
// ];

// /**
//  * 拍摄结果返回
//  */
// $cameraProgressRs = [
//     'status' => 1, // 1拍摄完成，2拍摄中，3失败（异常信息msg字段)
//     'msg'    => 'camera init success',
//     'action_id' => '拍摄号', // 拍摄号
//     'step' => '1', // 整数，1-10
//     'desc' => 'step 描述',
// ];
// echo json_encode($cameraProgressRs, JSON_UNESCAPED_UNICODE) . PHP_EOL;
// // 1. 关闭所有USB接口
// // 2. 对焦5秒
// // 3. 按下快门
// // 4. 松开快门和对焦
// // 5. 打开所有USB接口（每4个一组，每组间隔1秒）
// // 6. 从相机读取20张照片
// // 7. 将照片用OpenGL在大屏幕上渲染出来
// // 8. FFMPEG合成视频
// // 9. 上传视频（调用PHP对应接口）
// // 10. 拍摄完成 （视频生成并上传完成）

// echo json_encode($camResult, JSON_UNESCAPED_UNICODE) . PHP_EOL;

// $ta = [
//     'a' => 'a_t',
//     'b' => 'b_t'
// ];

// $uri = 'http://dev.mxj-moment.com';
// echo $uri .= '?'. http_build_query($ta) . PHP_EOL;

// for ($i = 'a'; $i < 'z'; $i ++) {
//     echo $i . '-';
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
// $t = array(
//     'key_1' => 'value_1',
// );
// $rs = array(
//     'key_2' => 'value_2'
// );
// $rs = array_merge($rs, $t);
// var_dump($rs);

// $str = 'abwef0';
// $str = substr($str, -4);
// $str = ltrim($str, '0');
// var_dump($str);
$t = array(
    'id' => 1,
    'name' => 2,
    'happy' => 'yes'
);
unset($t['id'], $t['name']);
// var_dump($t);

// $refundInfoStr = '{"fail_day_times":0,"fail_times":0,"error_message":"","refund_no":"10001","provider":"offline_refund","applet":"wxapp","offline_refund_info":{"expired_order":{"209362961625":{"balance":0,"deposit":5800}},"online_failed_order":[],"refund_order":[],"refund_form":{"account":"13670009350","type":"2","name":"\u6c5f\u4f73\u6d9b","device_info":{"errMsg":"getSystemInfo:ok","batteryLevel":100,"version":"6.7.3","system":"iOS 11.4","windowHeight":603,"pixelRatio":2,"screenHeight":667,"language":"zh_CN","statusBarHeight":20,"deviceOrientation":"portrait","windowWidth":375,"model":"iPhone 6","screenWidth":375,"fontSizeSetting":16,"brand":"iPhone","platform":"ios","SDKVersion":"2.3.2"},"uid":"1887609","refund_applet":"wxapp"},"refund_amount":{"balance":0,"deposit":5800}}}';
// $productInfo = json_decode($refundInfoStr, true);
// $offlineRefundInfo = $productInfo['offline_refund_info'];
// var_dump($offlineRefundInfo);
// T052DS11RW
// T125DS12ZA

// test array_merge
// $a1 = [
//     0 => 'first',
//     'name' => 'foo',
//     'foo' => 'bar1',
// ];
// $a2 = [
//     0 => 'bar',
//     'foo' => 'bar',
// ];
// $a3 = array_merge($a1, $a2);
// print_r($a3);
// $a4 = $a2 + $a1;
// print_r($a4);
// Error querying database.  Cause: com.mysql.cj.jdbc.exceptions.CommunicationsException: Communications link failure
// The last packet successfully received from the server was 37,949 milliseconds ago.
// The last packet sent successfully to the server was 37,992 milliseconds ago.

// echo (int) ((0.1 + 0.7) * 10) . PHP_EOL;
// echo serialize(0.1 + 0.7) . PHP_EOL;
// echo serialize(3) . PHP_EOL;

// $a = 9223372036854775807;
// $b = 9223372036854775808;
// var_dump($a, $b);

// echo "\u{0000aa}";

// $a = 'new string';
// $b = 1;
// xdebug_debug_zval('a');
// xdebug_debug_zval('b');

// $a = [
//     'meaning' => 'life',
//     'number' => 42
// ];
// xdebug_debug_zval('a');

// 这里引用计数会 -1 ，但是不在有任何变量指向这个容器，将导致内存泄漏。
// $a = ['one'];
// $a[] = &$a;
// xdebug_debug_zval('a');
// unset($a);
// xdebug_debug_zval('a');

// class Foo {

//     public $var = '3.1415962654';
// }
// // $baseMemory = memory_get_usage();
// for ($i = 0; $i <= 1000000; $i ++) {
//     $a = new Foo();
//     $a->self = $a;
//     // if ($i % 500 === 0) {
//     //     echo sprintf('%8d : ', $i), memory_get_usage() - $baseMemory, PHP_EOL;
//     // }
// }
// echo memory_get_peak_usage() , PHP_EOL;
// $res = [
//     'heart' => [
//         'score' => 95,
//         'desc' => '心脏非常健康',
//         'notice' => '心态很好，继续保持'
//     ],
//     'stomach' => [
//         'score' => 40,
//         'desc' => '风险极大',
//         'notice' => '早起早睡，不熬夜，一天三顿按时吃'
//     ],
// ];
// echo json_encode($res, true) . PHP_EOL;

// $project_stage = [
//     1 => '建设中',
//     2 => '土建竣工',
//     3 => '公共装修',
//     4 => '商业装修',
//     5 => '预招租',
//     6 => '招租',
//     7 => '正式入驻运营',
// ];
// echo json_encode($project_stage, JSON_UNESCAPED_UNICODE) . PHP_EOL;

// 已入驻
// {"1":"建设中","2":"土建竣工","3":"公共装修","4":"商业装修","5":"预招租","6":"招租","7":"正式入驻运营"}
$comment = [
    // 'format' => [
    //     'method' => 'map',
        // 'param' => [
        //     'format' => 'yyyy-mm-dd'
        // ],
    // ],
    //     'content' => [
    //         '3' => '否',
    //         '1' => '是',
    //     ],
    // ],
    'lang' => '消息内容',
    'comment' => '消息内容',
    // 'form' => [
        // 'edit' => 'enable',
        // 'control' => 'radio_button',
        // 'data' => 'relation',
        // 'param' => [
        //         'class' => 'backend\\\\models\\\\Salesman',
        //         'fields' => [
        //             0 => 'id',
        //             1 => 'name'
        //         ]
        //     ],
        // 'data' => 'map'
    // ]
];
// echo json_encode($comment, JSON_UNESCAPED_UNICODE, 4) . PHP_EOL;

// $str1 = '@abc';
// $str2 = '@234';
// // compare by ascii code
// var_dump(strncmp($str1, $str2, 1));

// $v = version_compare(PHP_VERSION, '7.0.0', '>=');
// var_dump($v);
// echo PHP_VERSION . PHP_EOL;

// $timestamp = date('U');
// $datetime = date('Y-m-d H:i:s');
// echo 'timestamp = ' . $timestamp . ' | datetime = ' . $datetime . PHP_EOL;

// echo date('Y-m-d H:i:s', 1554048000) . PHP_EOL;

// $str = 'SELECT i.operator_code, c.customer_name, p.product_name
// FROM sfo_implementation i
// JOIN sfo_customers c ON c.id = i.customer_id
// JOIN sfo_product p ON p.id = i.deploy_version
// WHERE i.operator_code IN (\''. implode($a, "','") .'\')';
// echo $str . PHP_EOL;

// $preg = "/^[1][3,4,5,6,7,8,9][0-9]{9}$/";
// $num = '19980453711';
// $pr = preg_match($preg, $num, $nums);
// var_dump($pr, $nums);

$t = '1. 踢出用户登陆
2. 网站修改为正在维护状态
3. 保持维护状态5分钟
4. 关闭网站
12. 部署新代码
5. 检查升级之前db状态
6. 创建升级周后新db
7. 导出老db数据
8. 导入老db数据到新db
9. 对比新老db数据表数据总和
10. 切换运营商db到新db
11. 跑migrate
13. 跑关键接口是否正常访问 （若异常helm rollback db切换回老db）
14. 回写自动升级状态
15. 打开网站访问
16. 通知操作人（短信）
17. 人工确认
18. 开放给客户确认使用';

// $tarr = explode("\n", $t);
// // var_dump($tarr);
// $tarr_1 = array_map(function ($it) {
//     $it = explode(" ", $it);
//     return $it[1];
// }, $tarr);
// print_r($tarr_1);

// $m = $arr['t'] ?? 'default';
// echo $m, PHP_EOL;

// $t = 0 ? true : false;
// var_dump($t);
$t = rand(0, 2);
echo $t, PHP_EOL;