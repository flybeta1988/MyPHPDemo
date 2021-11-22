<?php
include_once "DB.php";

$loop = 100;
$db = new DB();

for ($i = 0; $i < $loop; $i ++) {
    $row = $db->getRow("select * from org_course where id = 1");
    if (!$row) {
        continue;
    }

    $num = intval($row->num);
    if ($num > 0) {
        $num --;
        $sql = sprintf("UPDATE `org_course` SET `num` = %d WHERE id = %d", $num, 1);
        if ($db->exec($sql)) {
            echo "[ok] ". $sql. "\n";
        }
    }
}
echo "finished!\n";

