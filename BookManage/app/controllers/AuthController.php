<?php
namespace App\Controllers;

use App\Libs\Log;
use App\Libs\Request;
use App\Libs\Session;
use App\Libs\Util;
use App\Models\BookShelf;
use App\Models\Category;
use App\Models\User;

abstract class AuthController extends BaseController
{
    protected $cuid;
    protected $cuser;
    protected $role_id;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $login_uid = Session::get(Session::getUserKey());
        Log::info("admin login uid:". $login_uid);

        if (!$login_uid) {
            Util::redirect('/login');
        }

        $this->cuid = $login_uid;
        $this->cuser = User::get($login_uid);
        $this->role_id = $this->cuser->role_id;

        $this->smarty->assign("cuser", $this->cuser);
        $this->smarty->assign("shelfs", BookShelf::getList());
        $this->smarty->assign("categorys", Category::getList());
    }

    protected function isAdmin() {
        return User::ROLE_ADMIN == $this->cuser->role_id;
    }
}