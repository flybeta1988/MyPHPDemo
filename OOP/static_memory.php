<?php
$tail = "B(byte)\n";
$mem_st = memory_get_usage();
echo "memory sta:{$mem_st}". $tail;

$rows = [];
for ($i = 0; $i < 5; $i++) {
    $rows[] = $i;
}

echo "memory end:". memory_get_usage(). $tail;

$mem_us = memory_get_usage() - $mem_st;
echo "memory us:{$mem_us}". $tail;