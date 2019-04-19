<?php
/**
 * 测试php7新特性.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

class Test
{

    /**
     * private.
     *
     * @var integer
     */
    private $a = 1;

    // 标量类型申明
    public function sumOfInts(int ...$ints)
    {
        return array_sum($ints);
    }

    // 声明返回类型
    public function arraySum(array ...$arrays) : array
    {
        return array_map(function($arr) {
            return array_sum($arr);
        }, $arrays);
    }

    // null 合并运算符
    public function checkValue(array $t) : string
    {
        return $t['name'] ?? 'empty';
    }

    /**
     * unicode endpoint.
     *
     * @return string
     */
    public function unicodeEndpoint()
    {
        echo "\u{9999}";
    }

    /**
     * 整数除法.
     *
     * @param integer $a
     * @param integer $b
     *
     * @return integer
     */
    public function intdivTest($a, $b)
    {
        return intdiv($a, $b);
    }
}

$test = new Test();
// 标量申明
// 字符串和浮点数都转化为整数运算
echo $test->sumOfInts(1,'3', 5.5) . PHP_EOL;;
// 返回类型
var_dump($test->arraySum([1,2,3], [2,3,4], [3,44,5]));
// 测试null合并运算符
$resT = $test->checkValue(['namei' => 'value']);
var_dump($resT);

$test->unicodeEndpoint();

$getA = function () {
    return $this->a;
};
// Closure::call 闭包快速绑定
echo $getA->call(new Test);

var_dump($test->intdivTest(10, 4));

// 二进制 -> 十六进制
echo bin2hex(random_bytes(10)), PHP_EOL;
echo random_int(1, 9999999), PHP_EOL;
