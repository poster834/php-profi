<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\ForbiddenException;

class AdminController extends AbstractController
{
    
    public function adminBlog()
    {
        $articles = Article::findAll();
        $comments = Comment::findAll();
        $user = UsersAuthService::getUserByToken();

        if ($user === null) {
            throw new UnauthorizedException('Авторизуйтесь');
        }
        
        if ($user->isAdmin()) {
            $this->view->renderHtml('admin/adminBlog.php',[]);
        } else {
            throw new ForbiddenException();
        }
    }

    public function adminArticles()
    {
        $user = UsersAuthService::getUserByToken();
        if ($user->isAdmin()) {
            $articles = Article::findAll();
            $this->view->renderHtml('admin/adminArticles.php',['articles' => $articles]);
        } else {
            throw new ForbiddenException();
        }
    }

    public function adminComments()
    {
        $user = UsersAuthService::getUserByToken();
        if ($user->isAdmin()) {
            $comments = Comment::findAll();
            $this->view->renderHtml('admin/adminComments.php',['comments' => $comments]);
        } else {
            throw new ForbiddenException();
        }
    }


}