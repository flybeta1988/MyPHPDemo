<?php

function curl($url, $post_data = 0, $method='POST') {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);

        if ($post_data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        }
    } elseif ($method == 'GET'){
        curl_setopt($ch, CURLOPT_HEADER, true);
    }

    $output = curl_exec($ch);

    if ($output) {
        curl_close($ch);
        return $output;
    } else {
        $error = curl_errno($ch);
        curl_close($ch);
        return ("curl出错，错误码: $error");
    }
}

$url = "http://org-ddev.xnw.com/v1/weibo/do_login";
$data = array(
    'account' => 'flybetatest',
    'password' => '123456',
);
$r = curl($url, $data);
var_dump($r);