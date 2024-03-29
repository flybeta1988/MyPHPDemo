<?php
// 开启session
session_start();
// 创建图片
$image = imagecreatetruecolor(100, 30);
// 背景色
$bgcolor = imagecolorallocate($image, 255, 255, 255);
// 填充背景色
imagefill($image, 0, 0, $bgcolor);
// 验证码
$captch_code = '';
// 验证码字符
$captch_code_str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
// 随机取出4个字符
for ($i=0; $i < 4; $i++) {
    $fontsize = 6;
    $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
    $fontcontent = substr($captch_code_str, rand(0, strlen($captch_code_str)), 1);
    $captch_code .= $fontcontent;
    $x = ($i*100/4)+rand(5, 10);
    $y = rand(5, 10);
    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
// 将验证码存入session
$_SESSION['authcode'] = $captch_code;
// 干扰点
for ($i=0; $i < 200; $i++) {
    $pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
    imagesetpixel($image, rand(1, 99), rand(1, 29), $pointcolor);
}
// 干扰线
for ($i=0; $i < 3; $i++) {
    $linecolor = imagecolorallocate($image, rand(80, 220), rand(80, 220), rand(80, 220));
    imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
}
// 输出图片
header('Content-type: image/png');
imagepng($image);
// 销毁图片
imagedestroy($image);
?>