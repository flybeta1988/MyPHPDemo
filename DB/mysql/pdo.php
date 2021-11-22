<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=6306;dbname=xnw', 'root', 'root');
} catch (Exception $e) {
    die("mysql连接失败");
}

$stmt = $db->query("select * from org_course order by id desc limit 10");
$rows = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($rows as $row) {
    echo "id:{$row->id} name:{$row->name}\n";
}
