<?php
namespace MyProject\Controllers;

use MyProject\View\View;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\ForbiddenException;
use \Error;
use MyProject\Controllers\CommentsController;

class ArticlesController extends AbstractController
{

    public function view(int $articleId)
    {
    $article = Article::getById($articleId);
    $comments = CommentsController::getCommentsByArticleId($articleId);

    if ($article === null) {
        throw new NotFoundException();
    }

    $articleAuthor = User::getByID($articleId);
    $this->view->renderHtml('articles/view.php',['article'=>$article, 'comments'=>$comments]);
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

 
        if ($article === null) {
          throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException('Авторизуйтесь чтобы редактировать статью');
        }

        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error'=>$e->getMessage(), 'article'=>$article]);
                return;
            }catch (ForbiddenException $e) {
                $this->view->renderHtml('errors/403.php', ['error'=>$e->getMessage()],403);
                return;
            }

            header ('Location: /www/articles/'.$article->getId(), true, 302);
            exit();
        }
        $this->view->renderHtml('articles/edit.php', ['article'=>$article]);

    }

    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException('Авторизуйтесь чтобы добавить статью');
        }
       
            if (!empty($_POST)) {
                try {
                    $article = Article::createFromArray($_POST, $this->user);
                } catch (InvalidArgumentException $e) {
                    $this->view->renderHtml('articles/add.php', ['error'=>$e->getMessage()]);
                    return;
                }catch (ForbiddenException $e) {
                    $this->view->renderHtml('errors/403.php', ['error'=>$e->getMessage()],403);
                    return;
                }

                header ('Location: '.$article->getId(), true, 302);
                exit();
            }
        


        $this->view->renderHtml('articles/add.php');
    }

    public function delete(int $id): void
    {
        $article = Article::getById($id);
        if ($article instanceof Article) {
            var_dump($article);
            $article->delete();
             echo "Статья ".$id. " успешно удалена";
        } else {
            $this->view->renderHtml('errors/notFound.php',['error'=>new Error()],404); 
        }
    }

    public function comments(int $articleId):void
    {
        $article = Article::getById($articleId);
        $comments = CommentsController::getCommentsByArticleId($articleId);
        $this->view->renderHtml('articles/view.php',['article'=>$article, 'comments'=>$comments]);
    }

   
}