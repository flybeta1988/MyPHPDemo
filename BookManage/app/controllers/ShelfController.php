<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\Request;
use App\Libs\Response;
use App\Models\Book;
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
        $cid = (int)$this->request->get("cid");
        if (!($name = $this->request->get("name"))) {
            throw new ActionException("无效name");
        }

        if (!$cid || !($category = Category::get($cid))) {
            throw new ActionException("无效cid");
        }

        if (($shelf = BookShelf::getFirst(array(["name", '=', $name])))) {
            throw new ActionException("书架名（{$name}）已存在");
        }

        $shelf = new BookShelf();
        $shelf->name = $name;
        $shelf->cid = $cid;
        if ($shelf->save()) {
            Response::exitJsonOk("保存成功");
        } else {
            Response::exitJsonFail("保存失败");
        }
    }

    public function delete() {
        $id = (int)$this->request->get("id");

        if (!$id || !($bookShelf = BookShelf::get($id))) {
            throw new ActionException("无效id");
        }

        if ($bookShelf->delete()) {
            Response::exitJsonOk("删除成功");
        } else {
            Response::exitJsonFail("删除失败");
        }
    }

    private function checkBookShelfValidate(Request $request, &$bookShelf) {
        if (!($id = $request->get('id')) || !($bookShelf = BookShelf::get($id))) {
            throw new ActionException("无效id");
        }
    }

    public function edit() {

        $this->checkBookShelfValidate($this->request, $shelf);

        if ($this->request->isPostMethod()) {
            $shelf->cid = $this->request->get('cid');
            $shelf->name = $this->request->get('name');
            if ($shelf->save()) {
                return Response::ok("修改成功");
            }
        }

        $this->smarty->assign("shelf", $shelf);
        $this->smarty->display('shelf/edit.tpl');
    }
}