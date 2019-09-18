<?php
/**
 * 测试脚本.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

function foo()
{
    echo 'call foo()', PHP_EOL;
    return true;
}

$a = false and foo();
var_dump($a);
