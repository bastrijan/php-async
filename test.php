<?php

ob_end_clean();
header("Connection: close");
ignore_user_abort(); // optional
ob_start();
echo ('Text the user will see');
$size = ob_get_length();
header("Content-Length: $size");
ob_end_flush(); // Strange behaviour, will not work
flush();            // Unless both are called !
session_write_close(); // Added a line suggested in the comment
// Do processing here 
sleep(30);
echo('Text user will never see');