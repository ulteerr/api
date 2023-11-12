<?php

namespace app\core;

class View
{
    public $path;
    public $route;
    public $default;

    public function __construct($route = false)
    {
        if ($route) {
            $this->route = $route;
            $this->path = $route['controller'] . '/' . $route['action'];
        }
        $this->default = base_path() . '/app/views/default.php';
    }

    public function render($content)
    {
        header('Content-Type: application/json');
        require $this->default;
    }

    public function redirect($url)
    {
        header('location:' . $url);
        exit;
    }
    public function errorCode($code)
    {
        http_response_code($code);

        $content = json_encode([
            'code' => $code,
            'error' => config("errors.{$code}"),
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        $this->render($content);

        exit;
    }
}
