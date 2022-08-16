<?php

namespace MyProject\Controllers\Api;

use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesApiController extends AbstractController
{
    public function view(int $articleId)
    {
        $article = Article::getByID($articleId);

        if ($article === null) {
            
            throw new NotFoundException();
        }

        $this->view->displayJson([
            'articles' => [$article]
        ]);
    }

   public function add()
   {
    $input = $this->getInputData();
    $articleFromRequest = $input['articles'][0];

    $authorId = $articleFromRequest['author_id'];
    $author = User::getById($authorId);

    $article = Article::createFromArray($articleFromRequest, $author);
    $article->save();

    header('Location: /www/api/articles/' . $article->getId(), true, 302);
   }
}