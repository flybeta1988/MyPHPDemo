<?php
include_once "./CourseBase.php";
include_once "./Course4List.php";
$course_list = [];
for ($i = 1; $i <= 5; $i++) {
    $course = new Course4List();
    $course->setId($i);
    $course->setName("名称{$i}");
    $course->setGrouping(1);
    $course_list[] = $course->toArray();
}
var_dump(json_encode($course_list));
