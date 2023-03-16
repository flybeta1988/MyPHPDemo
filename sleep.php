<?php
$ms = mt_rand(100, 999);
usleep($ms);
echo "I'm sleep test, sleep {$ms}ms !";
