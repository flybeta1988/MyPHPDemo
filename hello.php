<?php

var_dump(chr(66));
var_dump(ord("A"));

die();

print_r(str_split('abc'));

$str = '中国';
for ($i = 0; $i < strlen($str); $i ++) {
    echo $str[$i]. "\n";
}
