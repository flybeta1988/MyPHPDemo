<?php

class BookController extends BaseController
{
    public function index() {
        echo "Hello, this is home page!";
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.html');
    }

    public function detail() {
        $id = $this->request->get('id');
        $book = BookModel::get($id);
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('detail.html');
    }
}