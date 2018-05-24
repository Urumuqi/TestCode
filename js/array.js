function for1() {
    var arr =[1, 2, 3, 4, 5];
    var t = [];
    for (var i in arr) {
        console.log('item = ' + arr[i]);
        if (arr[i] < 4) {
            t.push(arr[i]);
        }
    }
    for (var it of t) {
        console.log('it = ' + it);
    }
}

var toSum = function(nums, target) {
    var tmp = new Array();
    for (var i in nums) {
        if (nums[i], target) {
            tmp.push(nums[i]);
        }
    }
    var result = new Array();
    if (tmp.length > 0) {
        for (var i in tmp) {
            var lt = target - tmp[i];
            tmp.pop(tmp[i]);
            for (var it in tmp) {
                if (lt == tmp[it]) {
                    result.push(parseInt(i));
                    result.push(parseInt(it));
                }
            }
            if (result.length == 2) {
                break;
            }
        }
    }
    return result;
};