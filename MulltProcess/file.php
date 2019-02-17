<?php

define('FORK_NUMS', 3);
$pids = array();
$fp = fopen('./test.log', 'wb');
$num = 1;

// 共享内存段的key
$shmKey = 123;
// 创建共享内存段
$shmId = shmop_open($shmKey, 'c', 0777, 64);
//写入数据到共享内存段
shmop_write($shmId, $num, 0);

for($i = 0; $i < FORK_NUMS; ++$i) {
    $pids[$i] = pcntl_fork();
    if($pids[$i] == -1) {
        die('fork error');
    } else if ($pids[$i]) {
        //阻塞，等待子进程退出
        //注意这里，如果是非阻塞的话，$num的计数会出现问题。
        pcntl_waitpid($pids[$i], $status);
    } else {
        //读取共享内存段中的数据
        $num = shmop_read($shmId, 0, 64);

        for($i = 0; $i < 5; ++$i) {
            fwrite($fp, getmypid() . ' : ' . date('Y-m-d H:i:s') . " : {$num} \r\n");
            echo getmypid(), ": success \r\n";
            //递增$num
            $num = intval($num) + 1;
        }

        //写入到共享内存段中
        shmop_write($shmId, $num, 0);
        exit;
    }
}
//shmop_delete不会实际删除该内存段，它将该内存段标记为删除。
shmop_delete($shmId);
shmop_close($shmId);
fclose($fp);
