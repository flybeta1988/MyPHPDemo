<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\DB;
use App\Libs\Log;
use App\Libs\Request;
use App\Libs\Response;
use App\Models\Book;
use App\Models\LendRecord;

class LendController extends AuthController
{
    public function index(Request $request) {
        $filter = [];
        if (!$this->isAdmin()) {
            $filter[] = ['reader_id', '=', $this->cuid];
        }
        $records = LendRecord::getListＷithPage($total, $filter, $request->get('page'));
        $this->smarty->assign("total", $total);
        $this->smarty->assign("rows", $records);
        $this->smarty->display('lend/index.tpl');
    }

    private function checkValidate(Request $request, &$record) {
        if (!($id = $request->get('id')) || !($record = LendRecord::get($id))) {
            throw new ActionException("无效id");
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

    public function add() {
        if ($this->request->isPostMethod()) {
            try {
                DB::beginTransaction();
                $book_ids = $this->request->getArr('book_ids');
                foreach ($book_ids as $book_id) {
                    $lendRecord = new LendRecord();
                    $lendRecord->book_id = $book_id;
                    $this->save($lendRecord);
                }
                DB::commit();
                return Response::ok("添加成功");
            } catch (\Exception $e) {
                Log::warning(__METHOD__. " msg:". $e->getMessage());
                DB::rollBack();
                return Response::fail($e->getMessage());
            }
        }
        $this->smarty->display('lend/add.tpl');
    }

    public function delete() {

        $this->checkValidate($this->request, $user);

        if ($user->delete()) {
            return Response::ok("删除成功");
        } else {
            return Response::fail("删除失败");
        }
    }

    public function returnBack() {

        $status = (int)$this->request->get('status');
        if (!$status) {
            throw new ActionException("invalid status");
        }

        $this->checkValidate($this->request, $record);

        if ($status == $record->status) {
            throw new ActionException("此书已归还，无需重复操作");
        }

        $record->status = $status;
        $record->return_time = time();

        try {
            DB::beginTransaction();
            if ($record->save()) {
                Book::returnBack($record->book_id);
                $result = Response::ok("还书成功");
            } else {
                $result = Response::fail("还书失败");
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $result = Response::fail($e->getMessage());
        }
        return $result;
    }
}