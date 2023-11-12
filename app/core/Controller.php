<?php

namespace app\core;

use app\core\View;

abstract class Controller
{
	public $route;
	public $api;
	public $view;

	public function __construct($route)
	{
		$this->route = $route;
		$this->view = new View($route);
		$this->api = $this->loadApi($route['api']);
	}

	public function loadApi($name)
	{
		$path =  "app\\api\\" .$name;
		if (class_exists($path)) {
			return new $path;
		}
	}
}
