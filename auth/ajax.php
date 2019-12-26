<?php
$auth = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
$base64arr = explode(' ', $auth);
$base64str = $base64arr[1];
$result = base64_decode($base64str);
list($account, $password) = explode(':', $result);
var_dump($account, $password);