<?php

$arr = array (
    100 => array (
        'id' => 1000,
        'name' => 'Name0',
    ),
    101 => array (
        'id' => 1001,
        'name' => 'Name1',
    ),
);

$arr = array (
    array (
        'id' => 1000,
        'name' => 'Name0',
    ),
    array (
        'id' => 1001,
        'name' => 'Name1',
    ),
);

$data = array ();

foreach ($arr as $a) {
    $data[]['id'] = $a['id'];
    $data[]['name'] = $a['name'];
    $data[]['address'] = '北京 海淀';
}

/*foreach ($arr as $k => $a) {
    $data[$k]['id'] = $a['id'];
    $data[$k]['name'] = $a['name'];
    $data[$k]['address'] = '北京 海淀';
}*/
print_r($data);

die();

$org_id = 100;
$sql = sprintf("SELECT
	o.id,
	o.`name`,
	q.id AS qid,
	q.parent_id,
	q.root_id,
	q.`name` AS qname,
	FROM_UNIXTIME(q.ctime)
FROM
	org_information AS o
LEFT JOIN qun AS q ON o.official_uid = q.uid
WHERE
	q.parent_id = 0
AND q.label = '学校'
AND o.id = %d
ORDER BY
	o.id", $org_id);

echo $sql;
die();

$arr = [];
if (empty($arr['id'])) {
    print "xxx \n";
}

die();

$i = 1;

while ($i < 10) {
    echo $i. "\n";
    $i ++;
}

die();
$arr = array(
    0, 0, 1, 4, 100, 0, 200, 0
);

function deleteZero (&$arr) {
    foreach ($arr as $key => $a) {
        if (0 === $a) {
            unset($arr[$key]);
        }
    }
}

deleteZero($arr);
print_r($arr);

