<?php
/**
 * 两数之和.
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * 示例:
 * 给定 nums = [2, 7, 11, 15], target = 9
 * 因为 nums[0] + nums[1] = 2 + 7 = 9
 * 所以返回 [0, 1]
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

class Sum
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $prepare = [];
        foreach ($nums as $k => $num) {
            if ($num < $target) {
                $prepare[] = [
                    'key' => $k,
                    'value' => $num
                ];
            }
        }
        if (empty($prepare)) {
            return [];
        }
        $count = count($prepare);
        $result = [];
        for ($i = 0; $i < $count; $i ++) {
            $result = $this->pop($i, $count, $target, $prepare);
            if (!empty($result) && is_array($result)) {
                break;
            }
        }
        return $result;
    }

    public function pop($offset, $count, $target, array $nums)
    {
        $left = $nums[$offset];
        $right = [];
        for ($offset; $offset < $count; $offset ++) {
            if (($left['value'] + $nums[$offset]['value']) == $target) {
                $right = $nums[$offset];
                break;
            }
        }
        if (empty($left)) {
            return false;
        }
        return [$left['key'], $right['key']];
    }
}

$nums = [2, 7, 11, 15];
$target = 9;
$rs = (new Sum())->twoSum($nums, $target);
var_dump($rs);
