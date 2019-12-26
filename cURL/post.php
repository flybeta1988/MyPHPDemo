<?php

include_once __DIR__. "/../vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log_file = __DIR__. "/../logs/monolog.log";

$log = new Logger('name');
$log->pushHandler(new StreamHandler($log_file, Logger::WARNING));

$log->addWarning('Foo');

$ch = curl_init();

$fields = array(
    'id' => '1000',
    'name' => 'Flybeta',
    'email' => 'hcf@xnw.com',
);

$fields_string = http_build_query($fields);

$header[]="Content-type: text/xml";//定义content-type为xml
$data='<?xml version="1.0" encoding="utf-8"?>  
<root>  
  <data>  
    <username>admin</username>  
    <password>12345</password>  
  </data>
</root>';

curl_setopt($ch, CURLOPT_URL, 'http://demo.t.me:8081/cURL/input.php');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch,CURLOPT_HTTPHEADER, $header);//定义请求类型
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$output = curl_exec($ch);
var_dump($output);

curl_close($ch);
