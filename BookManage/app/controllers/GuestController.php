<?php
namespace App\Controllers;

use App\Libs\Session;
use App\Libs\Util;
use App\Models\User;

class GuestController extends BaseController
{
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

            if (!($user = User::getByNamePassword($account, md5($password)))) {
                Util::notice("用户名或密码错误");
            }

            Session::set(Session::getUserKey(), $user->id);

            Util::redirect("/");
        }
        $this->smarty->display('login.tpl');
    }

    public function logout() {
        Session::set(Session::getUserKey(), 0);
        Util::redirect("/login");
    }

    public function phpinfo() {
        phpinfo();
    }
}