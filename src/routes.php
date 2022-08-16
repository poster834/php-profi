<?php

return [
    '~^hello/(.*)$~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^articles/(\d+)#comment(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],
    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\CommentsController::class, 'addComment'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/logout$~' => [\MyProject\Controllers\UsersController::class, 'logout'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^(\d+)$~' => [\MyProject\Controllers\MainController::class, 'page'],
    '~^admin$~' => [\MyProject\Controllers\AdminController::class, 'adminBlog'],
    '~^admin/adminArticles$~' => [\MyProject\Controllers\AdminController::class, 'adminArticles'],
    '~^admin/adminComments$~' => [\MyProject\Controllers\AdminController::class, 'adminComments'],
    '~^users/profile$~' => [\MyProject\Controllers\UsersController::class, 'profile'],
];