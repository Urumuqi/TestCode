<?php
/**
 * php unset 内存释放测试.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

function foo(&$bar)
{
    // 只是释放了局部变量
    unset($bar);
    // 释放全局变量, 外部调用变量 undefined
    // unset($GLOBALS['bar']);
    $bar = 'foo';
}

// $bar = 'bar';
// foo($bar);
// echo $bar . PHP_EOL;

/**
 * (unset) 强制类型转换
 * 区别于 unset()
 */
// $name = 'Felipe';
// $unsetName = (unset) $name;
// var_dump($unsetName);
// var_dump($name);
// unset($test);
$a = array(
    'adfadfasdfasdf' => 'adfadfadsfasd'
);
echo $a['adfadfasdfasdf'] . PHP_EOL;
