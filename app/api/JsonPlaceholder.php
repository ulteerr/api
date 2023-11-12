<?php
namespace app\api;

use GuzzleHttp\Client;

class JsonPlaceholder
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://jsonplaceholder.typicode.com',
            'timeout' => 2.0,
        ]);
    }
    public function getUsers()
    {
        return $this->client->get("/users")->getBody()->getContents();
    }

    public function getUserPosts($userId)
    {
        return $this->client->get("/users/{$userId}/posts")->getBody()->getContents();
    }

    public function getUserTodos($userId)
    {
        return $this->client->get("/users/{$userId}/todos")->getBody()->getContents();
    }

    public function getPosts($userId = false)
    {
        $userId = !empty($userId) ? "?userId={$userId}" : '';
        return $this->client->get("/posts{$userId}")->getBody()->getContents();
    }

    public function getPost($postId)
    {
        return $this->client->get("/posts/{$postId}")->getBody()->getContents();
    }

    public function addPost($userId, $title, $body)
    {
        return $this->client->post('/posts', [
            'json' => [
                'userId' => $userId,
                'title' => $title,
                'body' => $body,
            ],
        ])->getBody()->getContents();
    }

    public function editPost($params = [])
    {
        return $this->client->request('PATCH', "/posts/{$params['id']}", [
            'json' => $params,
        ])->getBody()->getContents();
    }

    public function deletePost($postId)
    {
        $response = $this->client->delete("/posts/{$postId}");
        return $response->getStatusCode() == 200 ? 'Successfully' : 'Error';
    }
}
