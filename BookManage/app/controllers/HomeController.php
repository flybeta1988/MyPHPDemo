<?php
namespace App\Controllers;

class HomeController extends BaseController
{
    public function index() {
        echo "Hello, this is home page!";
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.html');
    }
}