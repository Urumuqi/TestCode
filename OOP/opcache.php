<?php

// 将php文件加入到opcache 缓存
$t = opcache_compile_file('t_3.php');
var_dump($t);
