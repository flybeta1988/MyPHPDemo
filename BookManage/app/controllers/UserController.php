<?php
namespace App\Controllers;

use App\Exceptions\ActionException;
use App\Libs\Request;
use App\Libs\Response;
use App\Libs\Uploader;
use App\Models\Book;
use App\Models\User;
use Ramsey\Uuid\Uuid;

class UserController extends AuthController
{
    public function index() {
        $filter = array();
        $page = $this->request->get('page');
        $name = $this->request->get('keyword');
        if ($name) {
            $filter[] = ['name', 'LIKE', $name];
        }
        $users = User::getListＷithPage($total, $filter, $page);

        $this->smarty->assign("total", $total);
        $this->smarty->assign("users", $users);
        $this->smarty->display('user/index.tpl');
    }

    public function ajaxList() {
        return Response::ok("获取成功", User::getList());
    }

    private function checkValidate(Request $request, &$user) {
        if (!($id = $request->get('id')) || !($user = User::get($id))) {
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

    private function save(User $user) {
        $password = $this->request->get('password');
        $password2 = $this->request->get('password2');
        $password_md5 = $this->request->get('password_md5');

        if ($password != $password2) {
            throw new ActionException("两次密码不一致");
        }

        if ($user->id > 0) {
            if ($password_md5 != $user->password) {
                $user->password = $password_md5;
            } else {
                $user->password = md5($password);
            }
        } else {
            $user->password = md5($password);
        }

        $user->name = $this->request->get('name');

        $user->mobile = $this->request->get('mobile');
        $user->idcard = $this->request->get('idcard');
        $user->money = $this->request->get('money');
        $user->address = $this->request->get('address');
        $user->role_id = $this->request->get('role_id');
        if (!$user->save()) {
            throw new ActionException("保存失败");
        }
    }

    public function add() {
        if ($this->request->isPostMethod()) {
            $user = new User();
            $this->save($user);
            return Response::ok("添加成功");
        }
        $this->smarty->display('user/add.tpl');
    }

    public function delete() {

        $this->checkValidate($this->request, $user);

        if ($user->delete()) {
            return Response::ok("删除成功");
        } else {
            return Response::fail("删除失败");
        }
    }
}