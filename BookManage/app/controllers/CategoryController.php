<?php
namespace App\Controllers;

use App\Libs\Response;
use App\Models\Category;

class CategoryController extends AuthController
{
    public function index() {
        $rows = [];
        $categorys = Category::getList();
        foreach ($categorys as $category) {
            $rows[] = array(
                'id' => $category->id,
                'name' => $category->name,
            );
        }
        Response::exitJson($rows);
    }

    public function add() {
        $this->smarty->display('welcome.html');
    }
}