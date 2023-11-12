<?php

namespace app\controllers;

use app\core\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
        $data = $this->api->getPosts($userId);

        return $this->view->render($data);
    }
    public function show($id)
    {
        $data = $this->api->getPost($id);

        return $this->view->render($data);
    }
    public function create()
    {
        $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $body = isset($_GET['body']) ? $_GET['body'] : '';

        if ($userId && $body && $title) {
            $data = $this->api->addPost($userId, $title, $body);
        } else {
            $data = json_encode([
                'userId' => $userId ?: 'User id required, is empty',
                'title' => $title ?: 'Title id required, is empty',
                'body' => $body ?: 'Body id required, is empty',
            ], JSON_UNESCAPED_UNICODE);
        }

        return $this->view->render($data);
    }
    public function edit()
    {
        $params = [];
        foreach ($_GET as $key => $value) {
            if ($key === 'userId' || $key === 'title' || $key === 'body' || $key === 'id') {
                $params[$key] = $value;
            }
        }
        if (!empty($params)) {
            if (isset($params['id'])) {
                $data = $this->api->editPost($params);
            } else {
                $data = json_encode([
                    'id' => 'Id required, is empty',
                ], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $data = json_encode([
                'params' => 'is empty',
            ], JSON_UNESCAPED_UNICODE);
        }

        return $this->view->render($data);
    }
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if ($id) {
            $data = $this->api->deletePost($id);
        } else {
            $data = json_encode([
                'id' => $id ?: 'Id required, is empty',
            ], JSON_UNESCAPED_UNICODE);
        }

        return $this->view->render($data);
    }
}
