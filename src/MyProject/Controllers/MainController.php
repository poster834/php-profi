<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class MainController extends AbstractController
{
    
    public function main()
    {
        $this->page(1);
    }

    public function page(int $pageNum)
    {
        $pageCount = Article::getPagesCount(5);
        $this->view->renderHtml('main/main.php',[
            'articles' => Article::getPage($pageNum, 5),
            'previousPageLink' => $pageNum > 1 ? '/www/'. ($pageNum-1) : null,
            'nextPageLink' => $pageNum < $pageCount ? '/www/'. ($pageNum + 1) : null,
        ]);
    }

}