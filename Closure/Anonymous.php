<?php
/**
 * 闭包使用外部变量.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

$user = [
    'name' => 'wq',
    'value' => 'anonymous',
    'type' => 'closure'
];

$outerDate = date('Y-m-d H:i:s');
echo 'outer date is ' . $outerDate . PHP_EOL;

/**
 * use 传入的变量可以在闭包中使用，但是修改变量值只在闭包内生效
 * 需要在闭包内改变传入变量的值，需要使用变量引用 &$outerDate
 */
$anonymous = function () use ($user, &$outerDate) {
    $user['name'] = 'kali uganda';
    $outerDate = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($outerDate)));
    echo 'Closure date is ' . $outerDate . PHP_EOL;
    echo 'Wellcome ' . $user['name'] . ' use ' . $user['type'] . ' which values is ' . $user['value'] . PHP_EOL;
};

$anonymous();
print_r($user);
echo 'new outer date is ' . $outerDate . PHP_EOL;
