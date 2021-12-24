<?php
namespace App\Controllers;

use App\Libs\Response;
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
        $shelfs = BookShelf::getListＷithPage($total);
        $this->smarty->assign("total", $total);
        $this->smarty->assign("shelfs", $shelfs);
        $this->smarty->display('shelf/index.tpl');
    }

    public function add() {
        $this->smarty->display('welcome.html');
    }
}