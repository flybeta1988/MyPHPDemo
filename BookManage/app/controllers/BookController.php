<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\Log;
use App\Libs\Uploader;
use App\Models\Book;
use Ramsey\Uuid\Uuid;

class BookController extends AuthController
{
    public function index() {
        $filter = array();
        $page = $this->request->get('page');
        $name = $this->request->get('keyword');
        if ($name) {
            $filter[] = ['name', 'LIKE', $name];
        }
        $books = Book::getList($total, $filter, $page);

        $this->smarty->assign("total", $total);
        $this->smarty->assign("books", $books);
        $this->smarty->display('book/index.tpl');
    }

    public function detail() {
        $id = $this->request->get('id');
        $book = Book::get($id);
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->assign("book", $book);
        $this->smarty->display('book/detail.html');
    }

    public function add() {
        $add_result = 0;
        if ($this->request->isPostMethod()) {
            $book = new Book();
            $book->name = $this->request->get('name');
            $book->isbn = $this->request->get('isbn') ?? Uuid::uuid1();
            $book->thumb = (new Uploader('thumb'))->getFile();
            $book->cid = $this->request->get('cid');
            $book->sid = $this->request->get('sid');
            $book->uid = $this->cuid;
            if (!$book->save()) {
                throw new ActionException("保存失败");
            }
            $add_result = 1;
        }
        $this->smarty->assign('isbn', Uuid::uuid1());
        $this->smarty->assign('add_result', $add_result);
        $this->smarty->display('book/add.tpl');
    }
}