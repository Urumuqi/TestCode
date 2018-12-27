<?php
/**
 * 测试php魔术方法.
 *
 * @author wuqi <yuri1308960477@gmail.com>
 */


/**
 * Magic Class.
 */
class Magic
{

    public $public;

    protected $protected;

    private $private;

    /**
     * constructor.
     */
    public function __construct()
    {
        $this->public = 'public';
        $this->protected = 'protected';
        $this->private = 'private';
    }

    /**
     * magic func.
     */
    public function __get($key)
    {
        echo 'call ' . __FUNCTION__  . PHP_EOL;
        return $this->$key;
    }

    /**
     * 将对象转json.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }
}

$magic = new Magic();
// echo $magic->public . PHP_EOL;
// echo $magic->protected . PHP_EOL;
// echo $magic->private . PHP_EOL;
// echo $magic->default . PHP_EOL;
// php 7 好像不能直接把对象当字符串输出,重写__toString,再来一波
echo $magic;
