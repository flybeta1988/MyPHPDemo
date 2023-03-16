<?php
namespace App\Controllers;

use App\Models\Book;
use App\Models\BookShelf;
use App\Models\Category;
use App\Models\LendRecord;
use App\Models\SubscribeRecord;
use App\Models\User;

class HomeController extends AuthController
{
    public function index() {
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.tpl');
    }

    public function welcome() {
        $stat = array(
            'book' => Book::getTotal(),
            'user' => User::getTotal(),
            'category' => Category::getTotal(),
            'shelf' => BookShelf::getTotal(),
            'lend' => LendRecord::getTotal(),
            'subscribe' => SubscribeRecord::getTotal(),
        );
        $this->smarty->assign("stat", $stat);
        $this->smarty->display('welcome.tpl');
    }
}