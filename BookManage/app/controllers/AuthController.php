<?php
namespace App\Controllers;

use App\Libs\Log;
use App\Libs\Request;
use App\Libs\Session;
use App\Libs\Util;

abstract class AuthController extends BaseController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $login_uid = Session::get(Session::getUserKey());
        Log::info("admin login uid:". $login_uid);

        if (!$login_uid) {
            Util::redirect('/login');
        }
    }
}