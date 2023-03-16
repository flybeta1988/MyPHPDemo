<?php
$lesson_list = array(
    array(
        'start' => '09:00',
        'end' => '09:45',
    ),
    array(
        'start' => '09:45',
        'end' => '10:25',
    ),
    array(
        'start' => '10:30',
        'end' => '10:00',
    ),
);



$timestamp = strtotime("2017-06-11 8:05:00");

$date = date('Y-m-d', $timestamp);

$section = null;

foreach ($lesson_list as $key => $lesson) {
    $timestamp_start = strtotime($date .' ' . $lesson['start']);
    $timestamp_end = strtotime($date .' ' . $lesson['end']);
    if ($timestamp_start <= $timestamp && $timestamp <= $timestamp_end) {
        $section = $key;
        break;
    }
}

var_dump($section);
