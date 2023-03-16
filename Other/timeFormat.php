<?php

function convertHumanTimeDuration($second)
{
    $hour = "00";
    if ($second > 3600) {
        $hour = floor($second / 3600);
    }
    if (strlen($hour) == 1) {
        $hour = "0" . $hour;
    }

    $minute = "00";
    if (($second - $hour * 3600) > 60) {
        $minute = floor(($second - $hour * 3600) / 60);
        if (strlen($minute) == 1) {
            $minute = "0" . $minute;
        }
    }

    $sec = $second - $hour * 3600 - $minute * 60;
    if (strlen($sec) == 1) {
        $sec = "0" . $sec;
    }

    $result = [];
    if ((int)$hour) {
        $result[] = $hour;
    }
    $result[] = $minute;
    $result[] = $sec;
    var_dump($result);

    return $result ? join(':', $result) : '0:00';
}

function getDurationStrAttribute($duration)
{
    $duration_str = '0:00';
    if (is_numeric($duration)) {
        $second = floor(($duration / 1000));
        if ($second == 0) {
            //$second = 1;
        }
        $duration_str = convertHumanTimeDuration($second);
    }
    return $duration_str;
}

$r = getDurationStrAttribute(66000);
var_dump($r);