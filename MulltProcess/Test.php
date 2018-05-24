<?php

class Test
{
    protected static $maxCount = 10;

    public static function process()
    {
        for ($i = 0; $i < self::$maxCount; $i++) {
            $pid = pcntl_fork();
            if ($pid == -1) {
                die('could not fork');
            } elseif ($pid) {
                echo 'main' . PHP_EOL;
            } else {
                echo 'child : ' . $pid . PHP_EOL;
                exit; // 子进程处理完后退出
            }
        }
        // 等待子进程处理完成
        while (pcntl_waitpid(0, $status)) {
            $status = pcntl_wexitstatus($status);
            echo 'child thread ' . $status . ' complete' . PHP_EOL;
        }
    }
}

Test::process();
