<?php

$gmclient = new GearmanClient();
$gmclient->addServer();

$jobHandle = $gmclient->doBackground('reverse', 'this is a test');

if ($gmclient->returnCode() != GEARMAN_SUCCESS) {
    echo 'bad return code' . PHP_EOL;
    exit;
}
echo 'done' . PHP_EOL;
