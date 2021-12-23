<?php
namespace App\Controllers;

use App\Libs\ExtSmarty;
use App\Libs\Request;

abstract class BaseController
{
    protected $smarty;

    protected $request;

    protected $page_size = 10;

    public function __construct(Request $request) {
        if (is_null($this->smarty)) {
            $this->smarty = new ExtSmarty();
        }
        $this->request = $request;
    }
}