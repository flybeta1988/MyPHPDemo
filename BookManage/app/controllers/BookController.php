<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\Request;
use App\Libs\Response;
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
        $books = Book::getListＷithPage($total, $filter, $page);

        $this->smarty->assign("total", $total);
        $this->smarty->assign("books", $books);
        $this->smarty->display('book/index.tpl');
    }

    public function ajaxList() {
        return Response::ok("获取成功", Book::getList());
    }

    private function checkBookValidate(Request $request, &$book) {
        if (!($id = $request->get('id')) || !($book = Book::get($id))) {
            throw new ActionException("无效id");
        }
    }

    public function detail() {
        $this->checkBookValidate($this->request, $book);
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->assign("book", $book);
        $this->smarty->display('book/detail.tpl');
    }

    public function edit() {
        $this->checkBookValidate($this->request, $book);

        $save_result = 0;
        if ($this->request->isPostMethod()) {
            $this->save($book);
            $save_result = 1;
        }

        $this->smarty->assign("book", $book);
        $this->smarty->assign("save_result", $save_result);
        $this->smarty->display('book/edit.tpl');
    }

    private function save(Book $book) {
        $book->name = $this->request->get('name');
        $book->isbn = $this->request->get('isbn') ?? Uuid::uuid1();
        $book->price = $this->request->get('price') ?? 0.00;
        $book->thumb = (new Uploader('thumb'))->getFile();
        $book->cid = $this->request->get('cid');
        $book->sid = $this->request->get('sid');
        $book->uid = $this->cuid;
        if (!$book->save()) {
            throw new ActionException("保存失败");
        }
    }

    public function add() {
        $add_result = 0;
        if ($this->request->isPostMethod()) {
            $book = new Book();
            $this->save($book);
            $add_result = 1;
        }
        $this->smarty->assign('isbn', Uuid::uuid1());
        $this->smarty->assign('add_result', $add_result);
        $this->smarty->display('book/add.tpl');
    }

    public function statusModify() {

        $status = $this->request->get('status');
        $this->checkBookValidate($this->request, $book);

        if ($status == $book->status) {
            throw new ActionException("状态无需改变");
        }

        $book->status = $status;

        if ($book->save()) {
            return Response::ok("更新成功");
        } else {
            return Response::fail("更新失败");
        }
    }

    public function delete() {

        $this->checkBookValidate($this->request, $book);

        if (Book::STATUS_OFF != $book->status) {
            throw new ActionException("只有`已下架`的课程才可以删除");
        }

        if ($book->delete()) {
            return Response::ok("删除成功");
        } else {
            return Response::fail("删除失败");
        }
    }
}