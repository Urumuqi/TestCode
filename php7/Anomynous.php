<?php
/**
 * 匿名类.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

interface Logger
{
    public function log(string $msg);
}

class Anomynous
{
    private $logger;

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function getLogger() : Logger
    {
        return $this->logger;
    }
}

// new 初始化匿名类,用来渠道“阅后即焚”的类
$anomy = new Anomynous;
$anomy->setLogger(new class implements Logger {
    public function log(string $msg)
    {
        echo $msg;
    }
});
