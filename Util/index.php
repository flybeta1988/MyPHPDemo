<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 17-3-1
 * Time: 上午9:53
 */

$s = microtime(true);

sleep(5);

$e = microtime(true);

echo $s;
echo "\n";

echo $e;
echo "\n";

$r = round($e - $s, 4);
echo "\n";
echo $r;


die();
echo time();
echo "\n";
echo microtime();
echo "\n";
echo microtime(true);

echo "\n";
