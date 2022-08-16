<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Exceptions\NotFoundException;

class MainController extends AbstractController
{
    
    public function main()
    {
        $lastId = Article::getLastId();
        if ($lastId === null) {
            throw new NotFoundException();
        }
        $this->after($lastId + 1);
    }

    public function before(int $id)
        {
            $this->page(Article::getPageBefore($id, 5));
        }

    public function after(int $id)
        {
            $this->page(Article::getPageAfter($id, 5));
        }
        
    public function page(array $articles)
    {
        if ($articles === []) {
            throw new NotFoundException();
        }

        $firstId = $articles[0]->getId();
        $lastId = $articles[count($articles)-1]->getId();

        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'previousPageLink' => Article::hasPreviousPage($firstId) ? '/www/before/'.$firstId : null,
            'nextPageLink' => Article::hasNextPage($lastId) ? '/www/after/'.$lastId : null,
        ]);
    }
    

}