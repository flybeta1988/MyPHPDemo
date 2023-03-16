<?php
include_once "./MySort.php";

$nums = [90, 50, 70, 100, 20, 10, 60, 40, 30, 80];
rsort($nums);

//MySort::bubbleSort($nums, sizeof($nums));
MySort::selectSort($nums, sizeof($nums));

print_r($nums);
