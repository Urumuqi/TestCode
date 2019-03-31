<?php

/**
 * 序列化
 *
 * @author wq <yuri1308960477@gmail.com>
 */

class TestClass
{
    public $a = 1;
    public $b = 2;
    private $c = 3;
    protected $d = 4;

    public function __construct()
    {
    }

    public function getContent()
    {
        return [
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            'd' => $this->d,
        ];
    }
}

$obj = new TestClass();
$serialize = serialize($obj);
$obj1 = unserialize($serialize);
print_r($obj1);
