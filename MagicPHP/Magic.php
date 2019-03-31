<?php

class Magic
{

    private $name = 'magic';

    private $value = 'magic value';

    public function __construct()
    {

    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}

// $magic = new Magic();
// echo $magic->name . PHP_EOL;
// $magic->name = 'change magic name';
// echo $magic->name . PHP_EOL;
// $magic->type = 'type';
// echo $magic->type . PHP_EOL;
// echo json_encode($magic) . PHP_EOL;

$t = [
    'name' => 'name',
    'value' => 'foo'
];

$encode = json_encode($t);
$decode = json_decode($encode, true);
var_dump($decode);

