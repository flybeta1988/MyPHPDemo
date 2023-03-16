<?php
include_once __DIR__."/../data/CourseService.php";

$service = new CourseService();
$course_list = $service->getCourseList();
echo json_encode($course_list);
