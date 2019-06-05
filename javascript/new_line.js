
// array function
let aFun = () => {
    console.log('Call aFun')
    console.log(this)
}

// promise
const wait = () => new Promise((resolve, reject) => {
    setTimeout(resolve, 1000);
});

wait().then(() => {
    console.log('I promised to run after 1s')
    return wait();
}).then(() => {
    console.log('I promised to run after 2s')
});

// yield
function *calculator (input) {
    var doubleThat = 2 * (yield (input / 2))
    var another = yield (doubleThat)
    return (input * doubleThat * another)
}

var calc = calculator(10)
var res1 = calc.next()
var res2 = calc.next(7)
var res3 = calc.next(100)
console.log(res1, res2, res3)