<?php

include_once __DIR__. "/../app/configs/constants.php";
include_once LIBS_DIR. "/AutoLoader.php";
include_once BASE_DIR. "/vendor/autoload.php";

$app = new \App\Libs\App();
$app->start();
