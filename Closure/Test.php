<?php

$closure = function ($message) {
    echo 'Hello ' . $message . PHP_EOL;
};

$closure('Closure');

var_dump(method_exists($closure, '__invoke'));
