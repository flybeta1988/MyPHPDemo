<?php
namespace App\Controllers;

use App\Libs\Response;
use App\Models\Category;

class CategoryController extends AuthController
{
    public function index() {
        $rows = [];
        $categorys = Category::getListＷithPage();
        foreach ($categorys as $category) {
            $rows[] = array(
                'id' => $category->id,
                'name' => $category->name,
            );
        }
        Response::exitJsonOk($rows);
    }

    public function add() {
        $this->smarty->display('welcome.html');
    }
}