<?php

class Construct {

    public function __construct() {
        $a = func_get_args();
        $i = func_num_args();
        if (method_exists($this, $f = '__construct' . $i)) {
            call_user_func_array(array($this, $f), $a);
        }
    }

    public function __construct1($_param = '') {
        echo 'construct function with one param : ' . $_param . "\n";
    }

    public function __construct2($_param1 = '', $_param2 = '') {
        echo 'contruct function with two param : ' . $_param1 . ' ' . $_param2 . "\n";
    }

}

// Test Unit
$obj = new Construct();
$obj1 = new Construct('one');
$obj2 = new Construct('one', 'two');
