<?php
namespace Bin;

include_once __DIR__. "/../configs/constants.php";
include_once LIBS_DIR. "/AutoLoader.php";
include_once BASE_DIR. "/vendor/autoload.php";

abstract class ScriptBase
{
    public function __construct() {
        $this->run();
    }

    abstract protected function run();
}