<?php

namespace Root;

class Cycle
{

    /**
     * [$name description]
     * @var string
     */
    private $name;

    /**
     * [$link description]
     * @var Cycle
     */
    private $link;

    public function __construct($_param)
    {
        $this->name = $_param;
    }

    public function setLink(Cycle $link)
    {
        $this->link = $link;
    }

    public function __destruct()
    {
        echo "Destoying : " . $this->name . PHP_EOL;
    }
}

// test unit
// construct
$obj1 = new Cycle('foo 1');
$obj2 = new Cycle('foo 2');
$obj3 = new Cycle('foo 3');
$obj4 = new Cycle('foo 4');
// reference each other
$obj1->setLink($obj2);
$obj2->setLink($obj1);
// desturct them
$obj1 = null;
$obj2 = null;
// $num = 1;
$num = gc_collect_cycles();
$obj3 = null;
$obj4 = null;

var_dump($num);
