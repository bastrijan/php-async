<?php

// die(__DIR__);
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

ob_end_clean();
header("Connection: close");
ignore_user_abort(); // optional
ob_start();


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
// ob_flush();

// ob_end_clean();
// foreach ($process as $type => $data) {
//     if ($process::OUT === $type) {
//         // echo "\nRead from stdout: ".$data;
//     } else { // $process::ERR === $type
//         // echo "\nRead from stderr: ".$data;
//     }
// }
$size = ob_get_length();
header("Content-Length: $size");
ob_end_flush(); // Strange behaviour, will not work
flush();            // Unless both are called !
session_write_close(); // Added a line suggested in the comment

// Wait for the subprocess to finish
$process->wait();

// Optionally, you can check the subprocess exit code
// if (!$process->isSuccessful()) {
//     echo 'The command failed: ' . $process->getErrorOutput();
// } else {
//     echo 'The command succeeded.';
// }

// echo 'Hello 4 from main process (this waits until the subprocess has finished):' . date('Y-m-d H:i:s'). ' microtime:' . microtime() . PHP_EOL;
