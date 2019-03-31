<?php

class Test
{
    public static function instance()
    {
        return new static;
    }
}

class Child extends Test
{

}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);

$obj3 = Test::instance();
var_dump($obj3 instanceof Test);

$obj4 = Child::instance();
var_dump($obj4 instanceof Child);

$obj5 = Child::instance();
var_dump($obj5 instanceof Test);
