/** constants */
const PI = 3.1415926;
PI > 3.0;

/** scope variable*/
// 1
let a = b = [
    1, 2, 3, 5
];

for (let i = 0; i < a.length; i ++) {
    let t1 = a[i];
    console.log(t1);
}

for (let i = 0; i < b.length; i ++) {
    let t2 = b[i];
    console.log(t2);
}

let callbacks = [];
for (let i = 0; i <= 2; i ++) {
    callbacks[i] = i;
}
console.log(callbacks);

/** scope function */
// 2
{
    function foo() { return 1 }
    console.log(foo() === 1)
    {
        function foo() { return 2 }
        console.log(foo() === 2)
    }
    console.log(foo() === 1)
}

/** array function */
// 1. expression bodies
let evens = [];
odds = evens.map(v => v + 1)
pairs = evens.map(v => ({ even: v, odd: v + 1}))
nums = evens.map((v, i) => v + 1)
console.log(evens);
// 2. statement body
// nums.forEach(v => {
//     if (v % 5 === 0)
//         fives.push(v)
// })
// 3. More intuitive handling of current object context
// this.nums.forEach((v) => {
//     if (v % 5 === 0) {
//         this.fives.push(v)
//     }
// })

/** Extended Parameter Handling */
// 1. Default Parameter Values
function f (x, y = 1, z = 2) {
    return x + y + z
}
console.log(f(1, 2))
// 2. Rest Parameter
function f1 (x, y, ...a) {
    console.log(a)
    return (x + y) * a.length
}
console.log(f1(1, 2, 3, 5, 6, 4))
// 3. Spread Operator
let params = [1, 2, 3, 'hello']
let other = [1, 2, 3, 'ni hao', ...params]
console.log(other)

let str = 'hello';
let chars = [...str]
console.log(chars)

/** Template Literals */
// 1. String Interpolation
let customer = { name: "Foo" }
let card = { amount: 7, product: "Bar", unitprice: 42 }
let message = `Hello ${customer.name},
want to buy ${card.amount} ${card.product} for
a total of ${card.amount * card.unitprice} bucks?`
console.log(message)
// 2. Custom Interpolation
// get(`http://example.com/foo?bar=${bar + baz}&quux=${quux}`)
// 3. Raw String Access
let strings = [];
function quux (strings, ...values) {
    strings[0] === "foo\n"
    strings[1] === "bar"
    strings.raw[0] === "foo\\n"
    strings.raw[1] === "bar"
    values[0] === 42
}
quux(`foo\n${ 42 }bar`)
String.raw(`foo\n${ 42 }bar`) === "foo\\n42bar"
