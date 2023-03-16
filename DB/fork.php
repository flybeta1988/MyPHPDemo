<?php
include_once "DB.php";

$loop = 200;

for ($i = 0; $i < $loop; $i ++) {
    $db = new DB();
    var_dump($db);
    $row = $db->getRow("select * from `user` where id = 1");
}
echo "finished!\n";

