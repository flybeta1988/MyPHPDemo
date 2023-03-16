<?php
include_once "./CourseBase.php";
include_once "./Course4List.php";
$course_list = [];
for ($i = 1; $i <= 1; $i++) {
    $course = new Course4List();
    $course->setId($i);
    $course->setName("名称{$i}");
    $course->setGrouping(1);
    //var_dump(get_object_vars($course));die();
    $course_list[] = BusinessBaseModel::varsToArray($course);
}
print_r($course_list);die();
var_dump(json_encode($course_list));
