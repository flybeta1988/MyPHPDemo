<?php
include_once "DB.php";

$db = new DB();

$productId = 1;
$sql = sprintf("SELECT * FROM orders WHERE product_id = %d", $productId);
$order = $db->getRow($sql);

$msg = '';
$uid = mt_rand(10000, 99999);
if ($order && $order->id > 0) {
    $msg = '已售罄';
} else {
    $sql = sprintf("INSERT INTO `orders` (uid, product_id) value(%d, %d)", $uid, $productId);
    if ($db->insert($sql) && $db->getLastInsertId()){
        $msg = "恭喜你，秒到了！";
    } else {
        $msg = "秒杀失败！";
    }
}
echo "productId:{$productId} uid:{$uid} msg:{$msg}<br/>";
exit();
