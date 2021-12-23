<?php
namespace App\Libs;

class ExtSmarty extends \Smarty
{
    public function __construct()
    {
        parent::__construct();

        $this->template_dir = BASE_DIR. "/tpls/";
        $this->compile_dir = BASE_DIR. "/tpls_c/";
        $this->left_delimiter = "{{";
        $this->right_delimiter = "}}";

        $this->loadMyModifiers();
    }

    private function loadMyModifiers() {
        $this->registerPlugin('modifier', 'imageUrl', 'get_image_url');
        $this->registerPlugin('modifier', 'bookStatusMsg', 'App\Models\Book::getStatusMsg');
    }
}