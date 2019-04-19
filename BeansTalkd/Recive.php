<?php
/**
 * beanstalkd reciver.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$host = '';
$port = '11300';

$pheanstalk = Pheanstalk::create($host, $port, 20);

$pheanstalk->watch('test');

// while ($job = $pheanstalk->reserve()) {
//     // var_dump($job);
//     $recv = json_decode($job->getData(), true);
//     print_r($recv);
//     if ($recv['params']['id'] == 124) {
//         $pheanstalk->delete($job);
//     } else {
//         $pheanstalk->bury($job);
//     }
// }

$queue = Pheanstalk::create('');
//        var_dump($queue);
$queue->watch('test');
while ($job = $queue->reserve()) {
    $recv = json_decode($job->getData(), true);
    print_r($recv);
}
