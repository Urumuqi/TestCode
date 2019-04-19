<?php

$gen = (function () {
    yield 1;
    yield 2;

    return 3;
})();

foreach ($gen as $val) {
    echo $val, PHP_EOL;
}
// Generator::getReturn() 方法来获取生成器的返回值
echo $gen->getReturn(), PHP_EOL;

// 生成器委托

function gen_a() {
    yield 1;
    yield 2;

    yield from gen_b();
}

function gen_b() {
    yield 3;
    yield 4;
}

foreach (gen_a() as $val) {
    echo $val, PHP_EOL;
}