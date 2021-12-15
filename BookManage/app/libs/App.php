<?php
namespace App\Libs;

class App
{
    private $route;

    private $request;

    public function __construct() {

        $this->request = Request::getInstance();

        $request_uri = $_SERVER['REQUEST_URI'] ?? '';
        $this->route = $request_uri ? substr($request_uri, 0, strpos($request_uri, '?')) : '';
    }

    public function start() {
        $this->matchRoute();
    }

    private function matchRoute() {
        $routes = $this->loadRoutes();
        $action_str = $routes[$this->route] ?? '';
        if (!$action_str) {
            Util::redirect("/404.php");
        }

        list($controller, $action) = explode('@', $action_str);

        $func = new \ReflectionMethod('App\Controllers\\'.$controller, $action);
        $class = new $func->class($this->request);
        $method = $func->name;

        $this->callAction($class, $method, [$this->request]);
    }

    private function callAction($class, $method, $params=[]) {
        //方法1
        //$class->$method($this->request);

        //方法2
        //$func->invoke($class, $this->request);

        //方法3
        //(new $controller())->$action($this->request);

        //方法4
        try {
            call_user_func([$class, $method], ...$params);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            Util::redirect("/500.php?msg={$msg}");
        }
    }

    private function loadRoutes() {
        return include_once(CONFIG_DIR. "/routers.php");
    }
}