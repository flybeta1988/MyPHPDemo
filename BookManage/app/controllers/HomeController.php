<?php
namespace App\Controllers;

use App\Libs\Session;
use App\Libs\Util;
use App\Models\User;

class HomeController extends BaseController
{
    public function index() {
        $this->smarty->assign("user_name", "flybeta");
        $this->smarty->display('index.tpl');
    }

    public function welcome() {
        $this->smarty->display('welcome.html');
    }

    public function notice() {
        $msg = $this->request->get('msg') ?? '';
        $this->smarty->assign("msg", $msg);
        $this->smarty->display('jump.tpl');
    }

    public function login() {
        if ($this->request->isPostMethod()) {
            $account = $this->request->get('account');
            $password = $this->request->get('password');

            if (!$account || !$password) {
                Util::notice("用户名或密码不能为空");
            }

            if (!($user = User::getByNamePassword($account, $password))) {
                Util::notice("用户名或密码错误");
            }

            Session::set(
                Session::getUserKey($user->id),
                array("id" => $user->id, "name" => $user->name)
            );

            Util::redirect("/");
        }
        $this->smarty->display('login.tpl');
    }

    public function logout() {
        exit("logout ok!");
    }

    public function phpinfo() {
        phpinfo();
    }
}