<?php

class CourseLiveStatus {

    //未开始
    const NO_START = 0;

    //直播中
    const LIVING = 1;

    //已结束
    const OVER = 2;

    //缺课
    const LACK = 3;

    //已暂停
    const PAUSE = 4;

    //已下课，不是真正的结束直播（老师未点击结束直播），学生仍可发聊天
    const FINISH = 5;
}

function select($chapter_list) {
    while (($chapter = current($chapter_list))) {

        $item = $chapter;
        if (1 === count($chapter_list)) {
            return $item;
        } else {

            if (!($next_chapter = next($chapter_list))) {
                return $chapter;
            }

            if ($chapter['end_time'] < time() && in_array($chapter['live_status'],  [2, 3, 5])) {
                continue;
            }

            if (CourseLiveStatus::LIVING == $chapter['live_status']) {
                return $item;
            } else if (CourseLiveStatus::NO_START == $chapter['live_status']) {
                return $item;
            } else {
                return $item;
            }
        }
    }
}

$chapter_list = array(
    array(
        'id' => 1,
        'live_status' => CourseLiveStatus::OVER,
        'start_time' => strtotime('-2 hours'),
        'end_time' => strtotime('-1 hours')
    ),
    array(
        'id' => 2,
        'live_status' => CourseLiveStatus::FINISH,
        'start_time' => strtotime('-60 seconds'),
        'end_time' => strtotime('-1 hours')
    ),
    array(
        'id' => 3,
        'live_status' => CourseLiveStatus::FINISH,
        'start_time' => strtotime('-2 hours'),
        'end_time' => strtotime('-1 hours')
    ),
);

$r = select($chapter_list);
print_r($r);