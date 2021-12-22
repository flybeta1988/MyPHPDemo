<?php
namespace App\Controllers;

class HomeController extends AuthController
{
    public function index() {
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.tpl');
    }

    public function welcome() {
        $this->smarty->display('welcome.html');
    }
}