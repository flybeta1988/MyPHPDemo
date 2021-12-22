<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\Log;
use App\Libs\Uploader;
use App\Libs\Util;
use App\Models\Book;
use Ramsey\Uuid\Uuid;

class BookController extends AuthController
{
    public function index() {
        $books = Book::getList();
        $this->smarty->assign("books", $books);
        $this->smarty->display('book/index.tpl');
    }

    public function detail() {
        $id = $this->request->get('id');
        Log::info(__METHOD__. " id:{$id}");
        $book = Book::get($id);
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->assign("book", $book);
        $this->smarty->display('book/detail.html');
    }

    public function add() {
        if ($this->request->isPostMethod()) {
            var_dump($_FILES);
            var_dump($_REQUEST);

            $book = new Book();
            $book->name = $this->request->get('name');
            $book->isbn = Uuid::uuid1();
            $book->thumb = (new Uploader('thumb'))->getFile();
            if (!$book->save()) {
                throw new ActionException("保存失败");
            }
            echo "111";die();
            //Util::redirect("/book");
        }
        $this->smarty->display('book/add.tpl');
    }
}