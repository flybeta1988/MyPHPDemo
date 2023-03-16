<?php

$users = array(
    array(
        'id' => 100,
        'name' => '张三',
        'score' => 80,
    ),
    array(
        'id' => 101,
        'name' => '李四',
        'score' => 70,
    ),
    array(
        'id' => 102,
        'name' => '王五',
        'score' => 90,
    ),
);

function msort(&$ary, $compareField, $seq = 'DESC', $sortFlag = SORT_NATURAL) {
    $sortData = array();
    foreach ($ary as $key => $value) {
        $sortData[$key] = isset($value[$compareField]) ? $value[$compareField] : '';
    }

    if ($seq == 'DESC') {
        arsort($sortData, $sortFlag);
    } else {
        asort($sortData, $sortFlag);
    }

    $ret = array();
    foreach ($sortData as $key => $value) {
        $ret[] = $ary[$key];
    }

    $ary = $ret;
    return $ary;
}

msort($users, 'score', 'ASC');
print_r($users);