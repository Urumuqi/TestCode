<?php
/**
 * beanstalkd reciver.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$host = '47.110.90.211';
$port = '11300';

// $pheanstalk = Pheanstalk::create($host, $port, 20);

// $pheanstalk->watch('test');

// while ($job = $pheanstalk->reserve()) {
//     // var_dump($job);
//     $recv = json_decode($job->getData(), true);
//     print_r($recv);
//     // 消息处理成功， 或者处理失败， 都要调用一下回执函数
//     // if ($recv['params']['id'] == 124) {
//     //     $pheanstalk->delete($job);
//     // } else {
//     //     $pheanstalk->bury($job);
//     // }
// }

$queue = Pheanstalk::create($host, $port, 5);
$queue->watch('sa_internal');
while ($job = $queue->reserve()) {
    $recv = json_decode($job->getData(), true);
    print_r($recv);
}
