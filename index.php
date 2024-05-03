<?php

// die(__DIR__);
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

echo 'Test 1:' . date('Y-m-d H:i:s') . ' microtime:' . microtime() . PHP_EOL;
$process = new Process(['./my.sh']);
echo 'Test 1/1:' . date('Y-m-d H:i:s') . ' microtime:' . microtime() . PHP_EOL;

//$process->run();
$process->start();
// Sleep for 10 seconds
sleep(10);
echo 'Test 2:' . date('Y-m-d H:i:s'). ' microtime:' . microtime() . PHP_EOL;

// executes after the command finishes
//if (!$process->isSuccessful()) {
//    throw new ProcessFailedException($process);
//}

echo 'Test 3:' . date('Y-m-d H:i:s'). ' microtime:' . microtime() . PHP_EOL;

//echo $process->getOutput();

foreach ($process as $type => $data) {
    if ($process::OUT === $type) {
        echo "\nRead from stdout: ".$data;
    } else { // $process::ERR === $type
        echo "\nRead from stderr: ".$data;
    }
}



echo 'Test 4:' . date('Y-m-d H:i:s'). ' microtime:' . microtime() . PHP_EOL;
