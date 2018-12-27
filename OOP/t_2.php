<?php

class Foo
{
    public $bar;

    public function __construct()
    {
        $this->bar = function () {
            return 'this is bar' . PHP_EOL;
        };
    }
}

// old school way
$obj = new Foo();
$func = $obj->bar;
echo $func();

// current
echo ($obj->bar)();
