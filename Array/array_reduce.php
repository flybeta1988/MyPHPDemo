<?php

$ids_list = array(
    [1, 2, 4, 7, 9],
    [1, 3, 4, 5, 9],
);

$r = array_reduce($ids_list, 'array_intersect', []);
//$r = array_reduce($uid_list, 'array_merge', []);


function xarray_intersect($ids_list) {
    $result = [];
    $num = count($ids_list);
    foreach ($ids_list as $key => $ids) {
        if ($num === 0) {
            return [];
        } else if ($num == 1) {
            return $ids;
        } else if ($num > 1) {
            if (0 === $key) {
                $result = array_intersect($ids, $ids_list[$key+1]);
            } else {
                $result = array_intersect($result, $ids);
            }
        }
    }
    return $result;
}

$r = xarray_intersect($ids_list);
print_r($r);
