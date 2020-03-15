<?php

include_once __DIR__. "/../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log_file = __DIR__. "/../logs/monolog.log";

$log = new Logger('name');
$log->pushHandler(new StreamHandler($log_file, Logger::WARNING));

$log->addWarning('I am the input', $_REQUEST);

$data = file_get_contents('php://input');
var_dump($data);
parse_str($data, $output);
var_dump($output);
