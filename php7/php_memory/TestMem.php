<?php
/**
 * 测试PHP内存管理.
 *
 * @author wuqi <qiw1@jumei.com>
 */
namespace Test\name;

class TestMem
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function arrMem()
    {
        var_dump('Hello PHP!');
        $tArr = array_fill(1, 100, 'hello');
        var_dump(memory_get_usage());
        foreach ($tArr as $k => $v) {
            ${$v.$k} = null;
        }
        var_dump(memory_get_usage(true));
        var_dump(memory_get_usage());
        foreach ($tArr as $k => $v) {
            unset(${$v.$k});
        }
        var_dump(memory_get_usage(true));
        var_dump(memory_get_usage());
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getClass()
    {
        $className = get_called_class();
        $names = explode('\\', $className);
        print_r($names);
    }
}

TestMem::getClass();
