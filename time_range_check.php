<?php
$lesson_list = array(
    array(
        'start_time' => '09:00',
        'end_time' => '09:45',
    ),
    array(
        'start_time' => '09:45',
        'end_time' => '10:25',
    ),
    array(
        'start_time' => '10:30',
        'end_time' => '10:00',
    ),
);

$time_int_last = 0;
foreach ($lesson_list as $key => $lesson) {

    $section = $key+1;

    if (!$lesson) {
        echo "第{$section}节时间不能为空";
        break;
    }

    if (!key_exists('start_time', $lesson)) {
        echo "第{$section}节时间格式错误1";
        break;
    }

    if (!key_exists('end_time', $lesson)) {
        echo "第{$section}节时间格式错误2";
        break;
    }

    $time_int_start = strtotime($lesson['start_time']);
    $time_int_end = strtotime($lesson['end_time']);

    if (!$time_int_start || !$time_int_end) {
        echo "第{$section}节时间格式错误3";
        break;
    }

    //第1节以上才检查时间
    if ($key && $time_int_last && $time_int_start < $time_int_last) {
        echo "第{$section}节开始时间不能早于上一节结束时间";
        break;
    }

    if ($time_int_start > $time_int_end) {
        echo "第{$section}节开始时间不能晚于结束时间";
        break;
    }

    $time_int_last = $time_int_end;
}
