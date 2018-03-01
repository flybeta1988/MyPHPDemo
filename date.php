<?php

$r = getDateRangeByType(4);
var_dump($r);
function getDateRangeByType($time_limit) {
    $current_timestamp = time();
    $start_day = $end_day = '';
    switch ($time_limit) {
        case 1 : //本周
            $weekday = date("w", $current_timestamp);
            $a = $weekday - 1;
            $b = 8 - $weekday;
            $start_day = date("Y-m-d", strtotime("- $a day", $current_timestamp)); //周一
            $end_day = date("Y-m-d", strtotime("+ $b day", $current_timestamp));//周末
            break;
        case 2 : //上一周
            if (1 == date('w', $current_timestamp)) {
                $start_day = date("Y-m-d", strtotime("-1 monday", $current_timestamp));
                $end_day = date("Y-m-d", strtotime("-1 sunday", $current_timestamp  + 24*3600));
            } else {
                $start_day = date("Y-m-d", strtotime("-2 monday", $current_timestamp));
                $end_day = date("Y-m-d", strtotime("-1 sunday", $current_timestamp  + 24*3600));
            }
            break;
        case 3 : //最近一个月
            $start_day = date("Y-m-d", strtotime("-30 day", $current_timestamp));
            $end_day =  date("Y-m-d", $current_timestamp  + 24*3600);
            break;
        case 4 : //本学期
            $day = date('Y-m-d', $current_timestamp);
            $year = date('Y', $current_timestamp);
            $start_2 = $year . '-08-01';
            $end_1 = $year . '-01-31';
            if ($day >= $start_2) {
                $_start = $year . '-08-01';
                $_end = ($year + 1) . '-01-31';
            } elseif ($day <= $end_1) {
                $_start = ($year - 1) . '-08-01';
                $_end = $year . '-01-31';
            } else {
                $_start = $year . '-02-01';
                $_end = $year. '-07-31';
            }
            $start_day = $_start;
            $end_day = $_end;
            break;
        case 5 : //上学期
            $day = date('Y-m-d', $current_timestamp);
            $date_y = date('Y', $current_timestamp);
            $start_2 = $date_y . '-02-01';
            $end_1 = $date_y . '-07-31';

            if ($day >= $start_2) {
                $_start = ($date_y - 1) . '-08-01';
                $_end = $date_y . '-01-31';
            } elseif ($day <= $end_1) {
                $_start = ($date_y - 1) . '-02-01';
                $_end = ($date_y - 1) . '-07-31';
            } else {
                $_start = $date_y . '-02-01';
                $_end = $date_y. '-07-31';
            }
            $start_day = $_start;
            $end_day = $_end;
            break;
        case 6 ://本学年
            $day = date('Y-m-d', $current_timestamp);
            $date_y = date('Y');
            $start_2 = $date_y . '-09-01';
            $end_1 = $date_y . '-08-31';

            if ($day >= $start_2) {
                $_start =   $date_y . '-09-01';
                $_end =   ($date_y + 1) . '-08-31';
            } elseif($day <= $end_1) {
                $_start = ($date_y - 1) . '-09-01';
                $_end = $date_y . '-08-31';
            } else {
                $_start = $date_y . '-09-01';
                $_end = $date_y. '-08-31';
            }
            $start_day = $_start;
            $end_day = $_end;
            break;
        case 7 : //本学期已过的自然月（包含本月）
            $start = date('Y') . '-08-01';
            $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
            $end = date('Y-m-d', strtotime("$BeginDate +1 month -1 day"));
            $start_day = $start;
            $end_day = $end;
            break;
    }

    return  [
        'start' => $start_day,
        'end' => $end_day
    ];
}