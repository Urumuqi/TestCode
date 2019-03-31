<?php
/**
 * 对象复制，对象引用。
 */

/**
 * SimpleClass.
 */
class SimpleClass
{

}

$instance = new SimpleClass();

// 对象复制
$assigned = $instance;

// 对象引用，类似与给对象增加了一个别名
$reference = &$instance;

$instance->var = 'foo';

$instance = null;

var_dump($instance);
var_dump($assigned);
var_dump($reference);
