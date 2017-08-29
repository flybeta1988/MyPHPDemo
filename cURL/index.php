<?php

$card_list = array(
    'C001',
    'C002',
    'C003',
);

foreach ($card_list as $card) {
    $param = array(
        'att' => 6,
        'device_no' => 'D002',
        'attendance_time' => '20170607194041', //date('YmdHis'),
        'card_no' => $card
    );
    postUrl($param);
}

function postUrl($param) {

    $api = 'http://local.xnwdev.com/api/device_attendance_report';
    $url = $api. '&' . http_build_query($param);
    print $url;
    print "\n";

    // 创建一个新cURL资源
    $ch = curl_init();

    // 设置URL和相应的选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // 抓取URL并把它传递给浏览器
    curl_exec($ch);

    // 关闭cURL资源，并且释放系统资源
    curl_close($ch);

    print "\n\n";
}
?>
