<?php

echo 'Starting' . PHP_EOL;

$gmworkers = new GearmanWorker();
$gmworkers->addServer();
$gmworkers->addFunction('reverse', 'reverse_fn');
$gmworkers->addFunction('reverse_fast', 'reverse_fn_fast');

echo 'Waiting for job ...' . PHP_EOL;

while ($gmworkers->work()) {
    if ($gmworkers->returnCode() != GEARMAN_SUCCESS) {
        echo 'return_code : ' . $gmworkers->returnCode() . PHP_EOL;
        break;
    }
}

/**
 * handle job.
 *
 * @param [type] $job
 *
 * @return void
 */
function reverse_fn($job)
{
    echo 'Received job:' . $job->handle() . PHP_EOL;

    $workload = $job->workload();
    $workloadSize = $job->workloadSize();

    echo 'Workload : ' . $workload . '(' . $workloadSize . ')' . PHP_EOL;

    for ($i = 0; $i < $workloadSize; $i++) {
        echo 'Sending status :' . ($i + 1) . '/' . $workloadSize . ' complete' . PHP_EOL;
        $job->sendStatus($i, $workloadSize);
        sleep(1);
    }

    $result = strrev($workload);
    echo 'Result : ' . $result . PHP_EOL;
    return $result;
}

/**
 * handle job fast.
 *
 * @param [type] $job
 *
 * @return void
 */
function reverse_fn_fast($job)
{
    return strrev($job->workload());
}
