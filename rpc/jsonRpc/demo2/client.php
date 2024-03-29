<?php

chdir(__DIR__);
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', '1');

# bootstrap for the example directory
//require('bootstrap.php');
require_once __DIR__ . "/../../../vendor/autoload.php";

# get the url of the server script
$url = getServerUrl();

# create our client object, passing it the server url
$client = new JsonRpc\Client($url);


# set up our rpc call with a method and params
$method = 'divide';
$params = array(54, 6);

$success = false;

$success = $client->call($method, $params);

/*
# notify
$success = $Client->notify($method);
*/

/*
# batch sending
$Client->batchOpen();
$Client->call($method, $params);
$Client->notify($method, $params);
$Client->call($method, $params);
$Client->notify($method, $params);
$Client->call($method, $params);
$success = $Client->batchSend();
*/

echo '<form method="GET">';
echo '<input type="submit" value="Run Example"> Last run: ' . date(DATE_RFC822);
echo '</form>';
echo '<pre>';

echo '<b>return:</b> ';
echo $success ? 'true' : 'false';
echo '<br /><br />';

echo '<b>result:</b> ', print_r($client->result, 1);
echo '<br /><br />';

echo '<b>batch:</b> ', print_r($client->batch, 1);
echo '<br /><br />';

echo '<b>error:</b> ', $client->error;
echo '<br /><br />';

echo '<b>output:</b> ', $client->output;


function getServerUrl()
{

    $path = dirname($_SERVER['PHP_SELF']) . '/server.php';
    $scheme = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') ? 'https' : 'http';
    return $scheme . '://' . $_SERVER['HTTP_HOST'] . $path;

}
