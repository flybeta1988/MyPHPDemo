<?php

class MySort {

    /**
     * 冒泡排序
     * @param array $arr
     * @param int $len
     */
    public static function bubbleSort(array &$arr, int $len) {
        for ($i = 0; $i < $len - 1; $i ++) {
            echo "i: {$i}". PHP_EOL;
            echo "before: ". join(',', $arr). PHP_EOL;
            for ($j = 0; $j < $len - 1 - $i; $j ++) {
                echo "==> arr[{$j}]:{$arr[$j]} vs arr[". ($j + 1) ."]:". $arr[$j + 1]. PHP_EOL;
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                }
            }
            echo "after: ". join(',', $arr). PHP_EOL;
            echo PHP_EOL;
        }
    }

    /**
     * 选择排序
     * @param array $arr
     * @param int $len
     */
    public static function selectSort(array &$arr, int $len) {
        for ($i = 0; $i < $len - 1; $i ++) {
            $min = $i; //记录最小值，默认第1个元素是最小
            echo "i: {$i}". PHP_EOL;
            echo "before: ". join(',', $arr). PHP_EOL;
            for ($j = $i + 1; $j < $len; $j ++) { //访问未排序的元素
                echo "==> arr[{$j}]:{$arr[$j]} vs arr[". ($min) ."]:". $arr[$min]. PHP_EOL;
                if ($arr[$j] < $arr[$min]) { //找到目前最小值
                    $min = $j;
                    echo "+++++ min:{$arr[$min]}". PHP_EOL;
                }
            }
            if ($min != $i) {
                $tmp = $arr[$min];
                $arr[$min] = $arr[$i];
                $arr[$i] = $tmp;
            }
            echo "after: ". join(',', $arr). PHP_EOL;
            echo PHP_EOL;
        }
    }
}
