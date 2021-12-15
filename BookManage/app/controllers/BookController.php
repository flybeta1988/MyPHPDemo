<?php
namespace App\Controllers;

use App\Libs\Log;
use App\Models\Book;

class BookController extends BaseController
{
    public function index() {
        $books = Book::getList();
        var_dump($books);
        echo "Hello, this is home page!";
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.html');
    }

    public function detail() {
        $id = $this->request->get('id');
        Log::info(__METHOD__. " id:{$id}");
        $book = Book::get($id);
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->assign("book", $book);
        $this->smarty->display('detail.html');
    }

    public function add() {
        $book = new Book();
        $book->name = "111";
        $book->isbn = mt_rand(1000, 9999);
        if (!$book->save()) {
        }
    }
}