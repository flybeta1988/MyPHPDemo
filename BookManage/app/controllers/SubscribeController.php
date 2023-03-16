<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\DB;
use App\Libs\Log;
use App\Libs\Request;
use App\Libs\Response;
use App\Models\Book;
use App\Models\LendRecord;
use App\Models\SubscribeRecord;

class SubscribeController extends AuthController
{
    public function index(Request $request) {
        $filter = [];
        if (!$this->isAdmin()) {
            $filter[] = ['reader_uid', '=', $this->cuid];
        }
        $records = SubscribeRecord::getListＷithPage($total, $filter, $request->get('page'));
        //var_dump($records);die();
        $this->smarty->assign("total", $total);
        $this->smarty->assign("rows", $records);
        $this->smarty->display('subscribe/index.tpl');
    }

    private function checkValidate(Request $request, &$row) {

        if (($id = $request->get('id')) && !($row = SubscribeRecord::get($id))) {
            throw new ActionException("无效id");
        } elseif (($book_id = $request->get('book_id')) && !($row = SubscribeRecord::getFirstByBookIdReaderUid($book_id, $this->cuid))) {
            throw new ActionException("无效book_id");
        }

        if (!$this->isAdmin() && $row->uid != $this->cuid) {
            throw new ActionException("无权操作");
        }
    }

    public function detail() {
        $this->checkValidate($this->request, $book);
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->assign("book", $book);
        $this->smarty->display('user/detail.tpl');
    }

    public function edit() {
        $this->checkValidate($this->request, $user);

        if ($this->request->isPostMethod()) {
            $this->save($user);
            return Response::ok("保存成功");
        }

        $this->smarty->assign("user", $user);
        $this->smarty->display('user/edit.tpl');
    }

    private function save(LendRecord $lendRecord) {
        $book_id = $lendRecord->book_id;
        $reader_id = $this->request->get('reader_id');

        $add = $lendRecord->id > 0 ? 0 : 1;

        if (!$lendRecord->id) {
            $filter = array(
                ['book_id', '=', $book_id],
                ['reader_id', '=', $reader_id],
            );
            if (($record = LendRecord::getFirst($filter))) {
                throw new ActionException("图书(id:{$book_id})已被用户(id:{$reader_id})已借走");
            }
        }

        $lendRecord->reader_id = $reader_id;
        $lendRecord->uid = $this->cuid;
        $lendRecord->start_time = strtotime($this->request->get('start_time'));
        $lendRecord->end_time = strtotime($this->request->get('end_time'));
        if (!$lendRecord->save()) {
            throw new ActionException("保存失败");
        }

        //把书标记为“已借出”状态
        if ($add && $book_id) {
            Book::lendOut($book_id);
        }
        return $lendRecord;
    }

    public function delete() {

        $this->checkValidate($this->request, $row);
        $record = SubscribeRecord::get($row->id);
        if ($record->delete()) {
            return Response::ok("取消预约成功");
        } else {
            return Response::fail("取消预约失败");
        }
    }

    private function checkBookValidate(Request $request, &$book) {
        if (!($id = $request->get('id')) || !($book = Book::get($id))) {
            throw new ActionException("无效id");
        }
    }

    public function add() {
        $this->checkBookValidate($this->request, $book);
        if (Book::STATUS_FREE == $book->status) {
            throw new ActionException("此图书当前可直接借阅，无需预约");
        } elseif (Book::STATUS_OFF == $book->status) {
            throw new ActionException("此图书已下架，看看其他的吧");
        }

        if (SubscribeRecord::getFirstByBookIdReaderUid($book->id, $this->cuid)) {
            throw new ActionException("你已订阅过此书，无需重复订阅");
        }

        $subscribeRecord = new SubscribeRecord();
        $subscribeRecord->book_id = $book->id;
        $subscribeRecord->reader_uid = $this->cuid;
        if ($subscribeRecord->save()) {
            return Response::ok("预约成功");
        } else {
            return Response::fail("预约失败");
        }
    }
}