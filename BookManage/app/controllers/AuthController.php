<?php
namespace App\Controllers;

use App\Libs\Request;

abstract class AuthController extends BaseController
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }
}