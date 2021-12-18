<?php
namespace App\Controllers;

use App\Models\BookShelf;
use App\Models\Category;

/**
 * 书架管理
 * Class ShelfController
 * @package App\Controllers
 */
class ShelfController extends AuthController
{
    public function index() {
        $shelfs = BookShelf::getList();
        $this->smarty->assign("rows", $shelfs);
        $this->smarty->display('shelf/index.tpl');
    }

    public function add() {
        $this->smarty->display('welcome.html');
    }
}