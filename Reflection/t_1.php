<?php

class A {

    public function foo()
    {
        return __CLASS__;
    }
}

class B extends A {
    public function foo()
    {
        return __CLASS__;
    }
}

$b = new B();
$reflection = new ReflectionObject($b);
$fooReflection = $reflection->getMethod('foo');
$data2 = $fooReflection->invoke($b);
echo $data2 . PHP_EOL;

$parentReflection = $reflection->getParentClass();
$parentFooReflection = $parentReflection->getMethod('foo');
$data = $parentFooReflection->invoke($b);
echo $data . PHP_EOL;
