<?php
include_once __DIR__. "/../Util/Util.php";

$url1 = "http://org-ddev.xnw.com/v3/unit/chapter/list?limit=10&page=1&course_id=3582&keyword=&ajax=1&src=0&gid=30236809&passport=lOm%2B7rBIvdZgZOAEuchGCZv6ZdQ%3D";
$url2 = "http://org-ddev.xnw.com/v5/unit/chapter/list?limit=10&page=1&course_id=3582&keyword=&ajax=1&src=0&gid=30236809&passport=lOm%2B7rBIvdZgZOAEuchGCZv6ZdQ%3D";

$url1 = "http://org-demo.xnw.com:8082/v3/unit/chapter/list?gid=40224040&passport=Gda89KBkvdHBZEUEEchFCYaKIdo%3D&src=16&ver=5440&lang=cn&course_id=4537&chapter_id=3195&count=-20";
$url2 = "http://org-demo.xnw.com:8082/v5/unit/chapter/list?gid=40224040&passport=Gda89KBkvdHBZEUEEchFCYaKIdo%3D&src=16&ver=5440&lang=cn&course_id=4537&chapter_id=3195&count=-20";

$url1 = "https://org-ddev.xnw.com/v2/course/chapter/detail?id=1744&ajax=1&src=0&gid=30236809&passport=8hsvoKXZvddgZOAEuchGCStAOtQ%3D";
$url2 = "https://org-ddev.xnw.com/v3/course/chapter/detail?id=1744&ajax=1&src=0&gid=30236809&passport=8hsvoKXZvddgZOAEuchGCStAOtQ%3D";
Util::diffUrlResponse($url2, $url1);
Util::diffUrlResponse($url1, $url2);
