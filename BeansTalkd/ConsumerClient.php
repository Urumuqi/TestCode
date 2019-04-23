<?php
/**
 * beanstalkd comsumer client demo.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Pheanstalk\Pheanstalk;
use Pheanstalk\Contract\PheanstalkInterface;

class ConsumerClient
{

    /**
     * pheanstalked connection instance.
     *
     * @var Pheanstalk\Contract\PheanstalkInterface
     */
    private $pheanstalkd;

    /**
     * fork count limit.
     */
    const FORK_NUMS = 3;

    /**
     * fork counter.
     *
     * @var integer
     */
    private $pCnt = 0;

    /**
     * listen tube name.
     */
    const TUBE_NAME = 'default';

    // business process stat
    const FAILED  = 0; // 业务失败，重试也会失败
    const SUCCESS = 1; // 业务处理成功
    const RETRY   = 2; // 重试可以处理成功

    /**
     * constructor.
     *
     * @param string  $host
     * @param string  $port
     * @param integer $timeout
     */
    public function __construct($host, $port = '11300', $timeout = 20)
    {
        try {
            $this->pheastalkd = Pheanstalk::create($host, $port, $timeout);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * 监听队列.
     *
     * @param string $tubeName
     */
    public function process($tubeName = self::TUBE_NAME)
    {
        $this->pheanstalkd->watch($tubeName);
        while ($job = $this->pheanstalkd->reserve()) {
            // parse job data
            $recv = json_decode($job->getData(), true);
            $dealStat = 0; // $recv data process state. 0 failed | 1 success | 2 retry
            $dealStat = $this->routeCallback($recv);
            switch ($dealStat) {
                case self::FAILED:
                    $this->pheanstalkd->release($job);
                    break;
                case self::SUCCESS:
                    $this->pheanstalkd->delete($job);
                    break;
                case self::RETRY:
                    $this->pheanstalkd->bury($job);
                    break;
                default:
                    break;
            }
        }

        return;
    }

    /**
     * 处理业务数据.
     *
     * @param array $recv
     *
     * @return integer
     */
    public function routeCallback(array $recv)
    {
        print_r($recv);
        return rand(0, 2);
    }
}
