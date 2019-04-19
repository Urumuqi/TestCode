<?php
/**
 * beanstalkd publisher.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Pheanstalk\Pheanstalk;

$host = '';
$port = '11300';

$pheanstalk = Pheanstalk::create($host, $port, 20);

$msg = [
    'business_type' => 'project',
    'action' => 'sync_building',
    'params' => [
        'id' => 123142525
    ]
];

$pheanstalk->useTube('test')
            ->put(json_encode($msg));
