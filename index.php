<?php

$a = 'Hello A !';
$device_no = 'aaaaaaaaaa112rr';
$r = preg_match('/^[0-9A-Fa-f]{12}$/', $device_no);
var_dump($r);

$ids = '4172,4169,4160,4159,4158,4157,4156,4152,4149,4139,4125,4119,4115,4114,4110,4051,4050,4046,4010,3939';
$id_list = explode(',', $ids);

$ids2 = '3939,4010,4046,4050,4051,4110,4114,4115,4119,4125,4139,4149,4152';
$id_list2 = explode(',', $ids2);

$arr = array_diff($id_list, $id_list2);
print_r($arr);
echo join(',', $arr);
echo '<br/>';
echo $url;
$class_list = '
[
        {
            "id": 1309,
            "qid": 2957316,
            "status": 1,
            "category": 2,
            "course": {
                "id": 3555,
                "name": "过完年后的第1个直播课",
                "cover_url": "http://cdn.xnwimg.com/down/f:%7B1A3B4C03-9B63-4083-1E8C-EC32988F2F73%7D/1.jpg",
                "next_chapter": {
                    "id": 1209,
                    "name": "222",
                    "start_time": 1529358947,
                    "end_time": 1519447620,
                    "live_status": 0
                }
            },
            "status_str": ""
        },{
            "id": 1310,
            "qid": 2957316,
            "status": 1,
            "category": 2,
            "course": {
                "id": 3555,
                "name": "过完年后的第2个直播课",
                "cover_url": "http://cdn.xnwimg.com/down/f:%7B1A3B4C03-9B63-4083-1E8C-EC32988F2F73%7D/1.jpg",
                "next_chapter": {
                    "id": 1209,
                    "name": "222",
                    "start_time": 1549358947,
                    "end_time": 1519447620,
                    "live_status": 0
                }
            },
            "status_str": ""
        },{
            "id": 1311,
            "qid": 2957316,
            "status": 1,
            "category": 2,
            "course": {
                "id": 3555,
                "name": "过完年后的第3个直播课",
                "cover_url": "http://cdn.xnwimg.com/down/f:%7B1A3B4C03-9B63-4083-1E8C-EC32988F2F73%7D/1.jpg",
                "next_chapter": {
                    "id": 1209,
                    "name": "222",
                    "start_time": 1539358947,
                    "end_time": 1519447620,
                    "live_status": 0
                }
            },
            "status_str": ""
        }]
';

$class = [];
$tmp = [];
$live_class_list = json_decode($class_list, true);
foreach ($live_class_list as $key => $live_class) {
    $now = time();
    $next_chapter_list = isset($live_class['course']['next_chapter']) ? $live_class['course']['next_chapter'] : '';
    if ($next_chapter_list) {
        $start_time = (int)$next_chapter_list['start_time'];
        $tmp[$live_class['id']] = (int)($start_time - $now);
    }
}

print_r($tmp);
asort($tmp);
print_r($tmp);

if (!$class) {
    $lasted_class_id = key($tmp);
}


print_r($lasted_class_id);

die();
$org_session = 'a:7:{s:6:"_token";s:40:"1qmSXKVdG9ZAidDGvmACxEfch4w2vy5nhP05IqSS";s:50:"login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d";i:30236809;s:3:"_id";i:30236809;s:6:"_flash";a:2:{s:3:"old";a:0:{}s:3:"new";a:0:{}}s:9:"_previous";a:1:{s:3:"url";s:35:"http://org-ddev.xnw.com/course/list";}s:22:"PHPDEBUGBAR_STACK_DATA";a:0:{}s:9:"_sf2_meta";a:3:{s:1:"u";i:1518000263;s:1:"c";i:1518000090;s:1:"l";s:1:"0";}}';

$org_session2 = 'a:5:{s:6:"_token";s:40:"W3d38J5Jvu6VsgbBiB5MS6fnFsbsg4wroOMu0ITR";s:9:"_previous";a:1:{s:3:"url";s:29:"http://org-ddev.xnw.com/login";}s:22:"PHPDEBUGBAR_STACK_DATA";a:0:{}s:9:"_sf2_meta";a:3:{s:1:"u";i:1518052806;s:1:"c";i:1518052806;s:1:"l";s:1:"0";}s:6:"_flash";a:2:{s:3:"old";a:0:{}s:3:"new";a:0:{}}}';
$data = unserialize($org_session);
$data2 = unserialize($org_session2);
print_r($data);
print_r($data2);
die();

$domain = 'img.ddev.xnw.com:8083';
$base_domain = join('.', array_slice(explode('.', $domain), -2));
var_dump($base_domain);die();

$arr = [1, 2, 3, 4, 5, 6];

$a = array_slice($arr, -4);
print_r($a);die();

$arr = [];
if ($arr) {
    echo 'Y';
} else {
    echo 'N';
}
die();
//$app_class_id_str = '624,622,619,403,645,643,404,530,534,612,525,526,527,531,536,644,623,621,647,535,537,606,615,646,532';

$app_class_id_str = '647,646,645,644,643,624,623,622,621,619,615,612,606,537,536,535,534,532,531,530,527,526,525,404,403';
$web_class_id_str = '647,646,645,644,643,624,623,622,621,619,615,612,606,602,537,536,535,534,532,531,530,527,526,525,404,403';

$app_class_id_list = explode(',', $app_class_id_str);
rsort($app_class_id_list);
echo join(',', $app_class_id_list);
die();
print_r($app_class_id_list);
$web_class_id_list = explode(',', $web_class_id_str);

$diff1 = array_diff($app_class_id_list, $web_class_id_list);
$diff2 = array_diff($web_class_id_list, $app_class_id_list);

print_r($diff1);

echo "\n ========= \n";

print_r($diff2);

die();

function getLastWeekDateRange() {
    $week_date_num = date('N');

    $end_date = date(
        'Y-m-d',
        strtotime("-{$week_date_num} days")
    );

    $begin_date = date(
        'Y-m-d',
        strtotime('-6 days', strtotime($end_date))
    );

    return array(
        $begin_date,
        $end_date
    );
}
list($begin_date, $end_date) = getLastWeekDateRange();

var_dump($begin_date);
echo "\n";
var_dump($end_date);

die();

function getMonthListByDateRange ($startDate, $endDate) {
    $monthList = [];
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);
    $start = $startDateTime->modify('first day of this month');
    $end = $endDateTime->modify('first day of next month');
    $interval = DateInterval::createFromDateString('1 month');
    $period = new DatePeriod($start, $interval, $end);

    foreach ($period as $dt) {
        $m = $dt->format("Y-m");
        $monthList[] = $m;
    }

    return $monthList;
}

$r = getMonthListByDateRange('2017-10-01', '2018-10-01');
rsort($r);
var_export($r);
die();
$monthList = array (
    [
        'name' => '本学期',
        'sdate' => 000,
        'edate' => 0000,
    ]
);

$arr2 = [
    [
        'name' => '本学期2',
        'sdate' => 111,
        'edate' => 1111,
    ],
    [
        'name' => '上学期',
        'sdate' => 222,
        'edate' => 2222,
    ],
    [
        'name' => '本学年',
        'sdate' => 333,
        'edate' => 3333,
    ]
];
$monthList = array_merge($monthList, $arr2) ;

print_r($monthList);
die();
$startDateTime = new DateTime('2010-12-02');
$endDateTime = new DateTime('2012-05-06');
$start = $startDateTime->modify('first day of this month');
$t = $start->format('Y-m-d');
print $t;
die();
$end = $endDateTime->modify('first day of next month');
$interval = DateInterval::createFromDateString('1 month');
$period = new DatePeriod($start, $interval, $end);

foreach ($period as $dt) {
    echo $dt->format("Y-m") . "\n";
}
die();


function getLastWeekDateRange2() {
    $week_date_num = date('N');

    $end_date = date(
        'Y-m-d',
        strtotime("-{$week_date_num} days")
    );

    $begin_date = date(
        'Y-m-d',
        strtotime('-6 days', strtotime($end_date))
    );

    return array(
        $begin_date,
        $end_date
    );
}

$r = getLastWeekDateRange();
print_r($r);
die();

$str = '001';
$str = 'tttt';
if (is_numeric($str)) {
    echo 'Yes';
} else {
    echo 'No';
}

die();

date_default_timezone_set('Asia/Shanghai');
$cdate = date('Y');

// 8.1~1.31
// 2.1~7.31
$now = time();
$cterm_start = strtotime(date('Y-02-01', $now));
$cterm_end = strtotime(date('Y-07-31', $now));

if ($cterm_start < $now && $now < $cterm_end ) {
    $term_start = date('Y-m-d', $cterm_start);
    $term_end = date('Y-m-d', $cterm_end);
} else if ($now < $cterm_start) {
    $term_end = date('Y-m-d', $cterm_start);
    $term_start = date('Y-08-01', strtotime('last year', $now));
} else {
    $term_start = date('Y-m-d', strtotime(date('Y-08-01', $now)));
    $term_end = date('Y-01-31', strtotime('next year', $now));
}

echo $term_start . '~' . $term_end;
die();

$opts = getopt('f:hp:');
var_dump($opts);
die();

$day = date('Y-m-d');
echo $day;
echo "\n";
$d = date('Y-m-d', strtotime('next day'));
echo $d;

die();

$str = '国a';
echo mb_strlen($str);
die();
//$str = '';
//var_dump(count($str));
//die();

$arr = array (
    1, 2, 3, 4, 5
);

if (empty($foo)) {
    echo 'YYY';
}

$r = array_slice($arr, sizeof($arr)-2, 2);

var_dump($r);
