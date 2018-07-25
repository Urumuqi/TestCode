<?php

const NEWLINE = "\n\n";

if (strtolower(php_sapi_name()) != 'cli') {
    die("请在cli模式下运行");
}

$bizPath = "./childBiz/";

if (!is_dir($bizPath)) {
    @mkdir($bizPath, 0755, true);
}

$child = [];

$index = 0;
$loop = 10; //子进程的数量

//如果是资源类型的变量，父子进程会共享
//$f = fopen("./pcntl_fork_2.php", "r");

while ($index < $loop) {

    echo "当前进程：" . getmypid() . NEWLINE;

    $pid = pcntl_fork(); //fork出子进程

    //fork后父进程会走自己的逻辑，子进程从处开始走自己的逻辑，堆栈信息会完全复制给子进程内存空间，父子进程相互独立

    if ($pid == -1) { // 创建错误，返回-1

        die('进程fork失败');

    } else if ($pid) { // $pid > 0, 如果fork成功，返回子进程id

        //获取创建的子进程
        $child[$pid] = $pid;
        echo "{$pid} child create!" . microtime(true) . NEWLINE;

    } else { // $pid = 0

        // 子进程逻辑
        $sleepTime = rand(5, 18);
        sleep($sleepTime);
        $time = microtime(true);
        file_put_contents($bizPath.getmypid().".log", $time . ":" . $index . PHP_EOL, FILE_APPEND);
        exit(0);
    }
    $index++;
}

while (count($child)) {
    //阻塞等待
    $pid = pcntl_wait($status);
    $time = microtime(true);
    file_put_contents("./father.log", $time . ":" . $pid . ":" . $status . PHP_EOL, FILE_APPEND);
    if ($pid > 0) {
        unset($child[$pid]);
    }
    if ($pid == -1) {
        unset($child);
    }
//    foreach ($child as $k => $pid) {
//        //不阻塞循环判断 WNOHANG表示如果没有子进程退出立刻返回
//        $res = pcntl_waitpid($pid, $status, WNOHANG);
//        $time = microtime(true);
//        file_put_contents("./father.log", $time . ":" . $pid . ":" . $res . ":" . $status . PHP_EOL, FILE_APPEND);
//        if (-1 == $res || $res > 0) {
//            unset($child[$k]);
//        }
//    }
}

//fclose($f);
//主进程退出
exit(0);