<?php

// die(__DIR__);
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

echo 'Hello 1 from main process:' . date('Y-m-d H:i:s') . ' microtime:' . microtime() . PHP_EOL;
$process = new Process(['./my.sh']);
echo 'Hello 2 from main process:' . date('Y-m-d H:i:s') . ' microtime:' . microtime() . PHP_EOL;

//$process->run();
$process->start();
// Sleep for 10 seconds
echo 'Hello 3 from main process (after the subprocess has started):' . date('Y-m-d H:i:s'). ' microtime:' . microtime() . PHP_EOL;

// executes after the command finishes
//if (!$process->isSuccessful()) {
//    throw new ProcessFailedException($process);
//}

//echo $process->getOutput();

foreach ($process as $type => $data) {
    if ($process::OUT === $type) {
        echo "\nRead from stdout: ".$data;
    } else { // $process::ERR === $type
        echo "\nRead from stderr: ".$data;
    }
}



echo 'Hello 4 from main process (this waits until the subprocess has finished):' . date('Y-m-d H:i:s'). ' microtime:' . microtime() . PHP_EOL;
