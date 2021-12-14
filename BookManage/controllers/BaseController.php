<?php

abstract class BaseController
{
    protected $smarty;

    protected $request;

    public function __construct(Request $request) {
        if (is_null($this->smarty)) {
            $smarty = new Smarty();
            $smarty->template_dir = BASE_DIR. "/tpls/";
            $smarty->compile_dir = BASE_DIR. "/tpls_c/";
            $this->smarty = $smarty;
        }

        $this->request = $request;
    }
}