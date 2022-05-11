<?php
$result = array(
    'errCode' => 0,
    'errMsg' => '操作成功',
);
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $data = array(
        'id' => 200,
        'name' => '数伴365'
    );
} else {
    $data = array(
        'id' => 100,
        'name' => '数伴365'
    );
}
$result['data'] = $data;
echo json_encode($result);
exit();
