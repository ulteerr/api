<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
    public function index()
    {
        $data = json_encode([

            'Calling methods' => [
                ['getUsers' => '/users'],
                ['getUserPosts' => '/users/{id}/posts'],
                ['getUserTodos' => '/users/{id}/todos'],
                ['getPosts' => '/posts'],
                ['getPostsUser' => '/posts?userId={id}'],
                ['getPost' => '/posts/{id}'],
                ['createPost' => '/posts/create?title={$title}&body={$body}&userId={userId}'],
                ['editPost' => '/posts/edit?id={id}&title={$title}&body={$body}&userId={userId}'],
                ['deletePost' => '/posts/delete?id={id}']],

        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        return $this->view->render($data);
    }
}
