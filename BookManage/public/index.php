<?php

const BASE_DIR = __DIR__. "/..";
const APP_DIR = __DIR__. "/../app";
const CONFIG_DIR = APP_DIR . "/configs/";
const LIBS_DIR = APP_DIR . "/libs/";
const LOGS_DIR = APP_DIR. "/logs/";
const MODELS_DIR = APP_DIR. "/models/";
const TRAITS_DIR = APP_DIR. "/traits/";
const CONTROLLERS_DIR = APP_DIR. "/controllers/";

include_once LIBS_DIR. "/AutoLoader.php";
include_once BASE_DIR. "/vendor/autoload.php";

$app = new \App\Libs\App();
$app->start();
