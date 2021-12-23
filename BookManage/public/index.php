<?php
const BASE_DIR = __DIR__. "/..";
const APP_DIR = __DIR__. "/../app";
const CONFIG_DIR = APP_DIR . "/configs/";
const LIBS_DIR = APP_DIR . "/libs/";
const LOGS_DIR = APP_DIR. "/logs/";
const MODELS_DIR = APP_DIR. "/models/";
const TRAITS_DIR = APP_DIR. "/traits/";
const EXCEPTIONS_DIR = APP_DIR. "/exceptions/";
const CONTROLLERS_DIR = APP_DIR. "/controllers/";
const PUBLIC_DIR = BASE_DIR. "/public/";
const THUMBS_DIR = BASE_DIR. "/public/images/thumbs/";
const THUMBS_PATH = "/images/thumbs/";

include_once LIBS_DIR. "/AutoLoader.php";
include_once BASE_DIR. "/vendor/autoload.php";

$app = new \App\Libs\App();
$app->start();
