<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\Request;
use App\Libs\Response;
use App\Models\Category;

class CategoryController extends AuthController
{
    public function index() {
        $categorys = Category::getListＷithPage($total);

        $this->smarty->assign("total", $total);
        $this->smarty->assign("categorys", $categorys);
        $this->smarty->display('category/index.tpl');
    }

    public function add() {
        if (!($name = $this->request->get("name"))) {
            throw new ActionException("无效name");
        }

        if (($category = Category::getFirst(array(["name", '=', $name])))) {
            throw new ActionException("分类名（{$name}）已存在");
        }

        $category = new Category();
        $category->name = $name;
        if ($category->save()) {
            return Response::ok("保存成功");
        } else {
            return Response::fail("保存失败");
        }
    }

    public function delete() {
        $id = (int)$this->request->get("id");

        if (!$id || !($category = Category::get($id))) {
            throw new ActionException("无效id");
        }

        if ($category->delete()) {
            return Response::ok("删除成功");
        } else {
            return Response::fail("删除失败");
        }
    }

    private function checkValidate(Request $request, &$category) {
        if (!($id = $request->get('id')) || !($category = Category::get($id))) {
            throw new ActionException("无效id");
        }
    }

    public function edit() {

        $this->checkValidate($this->request, $category);

        if ($this->request->isPostMethod()) {
            $category->name = $this->request->get('name');
            if ($category->save()) {
                return Response::ok("修改成功");
            }
        }

        $this->smarty->assign("category", $category);
        $this->smarty->display('category/edit.tpl');
    }
}