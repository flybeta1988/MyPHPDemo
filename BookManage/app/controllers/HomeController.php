<?php
namespace App\Controllers;

class HomeController extends BaseController
{
    public function index() {
        echo "Hello, this is home page!";
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.html');
    }

    public function welcome() {
        $this->smarty->display('welcome.html');
    }

    public function login() {
        $this->smarty->display('login.html');
    }

    public function logout() {
        exit("logout ok!");
    }
}