<?php

function createGreeter($who)
{
    return function() use ($who) {
        echo 'Hello ' . $who;
    };
}

$greeter = createGreeter('World');
$greeter();
