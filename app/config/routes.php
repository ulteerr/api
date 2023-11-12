<?php
return [
    '/' => [
        'controller' => 'main',
        'action' => 'index',
        'api' => 'JsonPlaceholder',
    ],
    'users' => [
        'controller' => 'users',
        'action' => 'index',
        'api' => 'JsonPlaceholder',
    ],
    'users/{$userId}/posts' => [
        'controller' => 'users',
        'action' => 'posts',
        'api' => 'JsonPlaceholder',
    ],
    'users/{$userId}/todos' => [
        'controller' => 'users',
        'action' => 'todos',
        'api' => 'JsonPlaceholder',
    ],
    'posts' => [
        'controller' => 'posts',
        'action' => 'index',
        'api' => 'JsonPlaceholder',
    ],
    'posts/create' => [
        'controller' => 'posts',
        'action' => 'create',
        'api' => 'JsonPlaceholder',
    ],
    'posts/edit' => [
        'controller' => 'posts',
        'action' => 'edit',
        'api' => 'JsonPlaceholder',
    ],
    'posts/delete' => [
        'controller' => 'posts',
        'action' => 'delete',
        'api' => 'JsonPlaceholder',
    ],
    'posts/{id}' => [
        'controller' => 'posts',
        'action' => 'show',
        'api' => 'JsonPlaceholder',
    ],
];
