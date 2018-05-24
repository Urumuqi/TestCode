/**
 * 从排序数组中删除重复项
 *
 * 给定一个排序数组，你需要在原地删除重复出现的元素，使得每个元素只出现一次，返回移除后数组的新长度。
 * 不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。
 */

var arrayUnique = function(nums) {
    for (var i = 0; i < nums.length; i++) {
        var cur = nums[i];
        var fc = false;
        for (var v in nums) {
            if (nums[v] == cur && fc == false) {
                console.log('skip = ' + cur);
                fc = true;
                continue;
            }
            if (nums[v] == cur) {
                console.log('pop out = ' + nums[v]);
                nums.pop(v);
            }
        }
    }
    return nums;
}
var p = [0,0,1,2,33,1,33,2,5,6,7,10];
var r = arrayUnique(p)
console.log(r);
