<?php
namespace App\Controllers;

use App\Models\Category;

class CategoryController extends AuthController
{
    public function index() {
        $categorys = Category::getList();
        $this->smarty->assign("categorys", $categorys);
        $this->smarty->display('index.tpl');
    }

    public function add() {
        $this->smarty->display('welcome.html');
    }
}