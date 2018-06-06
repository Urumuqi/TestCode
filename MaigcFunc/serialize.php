<?php
/**
 * 测试php魔术方法.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */

/**
 * class Demo.
 */
class Demo
{
    /**
     * name.
     *
     * @var [type]
     */
    public $name;

    /**
     * age.
     *
     * @var [type]
     */
    private $age;

    /**
     * constructor.
     */
    public function __construct()
    {

    }

    /**
     * 序列化是被调用.
     *
     * @return array
     */
    public function __sleep()
    {
        echo 'in' . __FUNCTION__ . PHP_EOL;
        return array('name');
    }

    /**
     * 反序列化时被调用.
     */
    public function __wakeup()
    {
        echo 'in __wakeup' . PHP_EOL;
    }

    /**
     * 以字符串的方式处理对象.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * 以函数的方式调用一个对象.
     *
     * @param mixed $name
     *
     * @return void
     */
    public function __invoke($name)
    {
        var_dump($name);
    }

    /**
     * var_export object.
     *
     * @param array $properties
     *
     * @return void
     */
    public function __set_state(array $properties)
    {
        $obj = new Demo();
        $obj->name = $properties['name'];
        return $obj;
    }

    /**
     * call var_dump.
     *
     * @return array
     */
    public function __debugInfo()
    {
        return array(
                    'name' => $this->name,
                );
    }
}

$obj = new Demo();
$obj->name = 'demo';
$ser = serialize($obj);
print_r($ser);
$unser = unserialize($ser);
var_dump($unser);
echo $obj . PHP_EOL;
$obj('test');
var_dump(is_callable($obj));
var_export($obj);
var_dump($obj);
