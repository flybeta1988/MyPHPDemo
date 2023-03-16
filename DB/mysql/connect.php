<?php

$mysqli = new mysqli('localhost', 'root', '123456', 'test');

if ($mysqli->connect_errno) {
    printf("Connect to mysql error: %s", $mysqli->connect_error);exit();
}

/* Set the desired charset after establishing a connection */
$mysqli->set_charset('utf8mb4');

sleep(5);

printf("Success... %s\n", $mysqli->host_info);
