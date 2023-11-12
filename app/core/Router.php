<?php

namespace app\core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require base_path() . '/app/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params): void
    {
        $route = '#^' . $route . '(\?|$)#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = $_SERVER['REQUEST_URI'];
        if ($url !== '/') {
            $url = trim($_SERVER['REQUEST_URI'], '/');
        }
        foreach ($this->routes as $route => $params) {
            $urlParts = explode('/', $url);
            foreach ($urlParts as $key => $part) {
                $part = explode('?', $part, 2);
                $part = $part[0];
                if ($key === 0) {
                    continue;
                }
                if ($part) {
                    if (strpos($route, $part) === false) {
                        $params['param'][$key] = $part;
                        $route = preg_replace('/\{[^\}]+\}/', $part, $route);
                    }
                }
            }

            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        $view = new View();
        if ($this->match()) {

            $name_file = ucfirst($this->params['controller']) . 'Controller.php';
            $controller_сlass = "app\\controllers\\" . ucfirst($this->params['controller']) . 'Controller';
            $path = base_path() . "/app/controllers/" . $name_file;

            if (file_exists($path)) {
                if (class_exists($controller_сlass)) {

                    $action = $this->params['action'];
                    if (method_exists($controller_сlass, $action)) {

                        $controller = new $controller_сlass($this->params);
                        if (isset($this->params['param'])) {

                            $params = $this->params['param'];
                            return $controller->$action(...$params);
                        } else {
                            return $controller->$action();
                        }
                    }
                }
            }
        }
        return $view->errorCode('404');
    }
}
