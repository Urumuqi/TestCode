<?php

$gmclient = new GearmanClient();
$gmclient->addServer();

echo 'Sending job' . PHP_EOL;

do {
    $result = $gmclient->doNormal('reverse', 'Hello');

    switch ($gmclient->returnCode()) {
        case GEARMAN_WORK_DATA:
            echo 'Data : ' . $result . PHP_EOL;
            break;
        case GEARMAN_WORK_STATUS:
            list($numberator, $denominator) = $gmclient->doStatus();
            echo 'Status : ' . $numberator . '/' . $denominator . ' complete' . PHP_EOL;
            break;
        case GEARMAN_WORK_FAIL:
            echo 'Failed' . PHP_EOL;
            break;
        case GEARMAN_SUCCESS:
            echo 'Success : ' . $result . PHP_EOL;
            break;
        default:
            echo 'RET : ' . $gmclient->returnCode() . PHP_EOL;
            break;
    }
} while ($gmclient->returnCode() != GEARMAN_SUCCESS);
