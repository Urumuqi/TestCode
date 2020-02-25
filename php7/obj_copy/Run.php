<?php
/**
 * test for php object copy.
 *
 * @author wuqi <wuqi226@gmail.com>
 */

class SubObject
{
    static $instances = 0;
    static $cloneCount = 0;
    public $instance;

    public function __construct()
    {
        $this->instance = ++ self::$instances;
    }

    public function __clone()
    {
        ++ static::$cloneCount;
        $this->instance = ++ self::$instances;
    }

    public function __destruct()
    {
        -- self::$cloneCount;
    }
}

class MyCloneable
{
    public $subObj1;
    public $subObj2;

    public function __clone()
    {
        $this->subObj1 = clone $this->subObj1;
    }
}

$obj = new MyCloneable;

$obj->subObj1 = new SubObject;
$obj->subObj2 = new SubObject;

echo "origin object" , PHP_EOL;
print_r($obj);

echo "clone object" , PHP_EOL;
$obj2 = clone $obj;
print_r($obj2);

$clone2 = clone $obj;
$clone3 = clone $obj2;
$clone4 = clone $obj;

echo "copy count : " , SubObject::$cloneCount , PHP_EOL;

unset($clone4, $clone3);
echo "copy count : " , SubObject::$cloneCount , PHP_EOL;
