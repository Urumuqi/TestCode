<?php
/**
 * 冒泡排序，小数再后.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

$arr = [7, 8, 5, 1, 9, 10, 11, 10];
$len = count($arr);

for ($i = 1; $i < $len; $i++) {
    for ($j = 0; $j < $len - $i; $j++) {
        if ($arr[$j] < $arr[$j+1]) {
            list($arr[$j+1], $arr[$j]) = [$arr[$j], $arr[$j+1]];
        }
    }
}

print_r($arr);
