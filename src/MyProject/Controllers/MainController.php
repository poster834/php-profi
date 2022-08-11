<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class MainController extends AbstractController
{
    
    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php',['articles'=>$articles]);
    }


}