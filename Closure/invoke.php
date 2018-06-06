<?php
/**
 * magic function __invoke.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

/**
 * class CallableClass.
 */
class CallableClass
{
    public function __invoke($args)
    {
        var_dump($args);
    }
}

$obj = new CallableClass();
$obj(2);
var_dump(is_callable($obj));
