<?php

namespace app\controllers;

use app\core\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $data = $this->api->getUsers();
        return $this->view->render($data);
    }
    public function posts($id)
    {
        $data = $this->api->getUserPosts($id);
        return $this->view->render($data);
    }
    public function todos($id)
    {
        $data = $this->api->getUserTodos($id);
        return $this->view->render($data);
    }
}
