<?php

class A
{

    public function foo()
    {
        if (isset($this)) {
            echo sprintf('$this is defined (%s)', get_class($this)) . PHP_EOL;
        } else {
            echo '$this is not defined' . PHP_EOL;
        }
    }
}

class B
{
    public function bar()
    {
        A::foo();
    }
}

error_reporting(ERROR);

// test A
$a = new A();
$a->foo();
A::foo();

// test B
$b = new B();
$b->bar();
B::bar();
