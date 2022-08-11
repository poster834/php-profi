<?php
namespace MyProject\Controllers;
use MyProject\Services\Db;
use MyProject\Models\Comments\Comment;


class CommentsController extends AbstractController
{
    public static function getCommentsByArticleId(int $articleId):array 
    {
        $sql = 'SELECT * FROM comments WHERE `article_id` = :articleId;';
        $db = Db::getInstances();
        $result = $db->query($sql, [':articleId' => $articleId], Comment::class) ?? [];
        return $result;
    }

    public function addComment(int $articleId): void
    {
        $comment = Comment::createComment($_POST, $articleId, $this->user);
        $lastAddedComment = Comment::findLastAddedByColumn('article_id', $articleId);
        header ('Location: ../'.$articleId.'#comment'.$lastAddedComment->getId(), true, 302);
        exit();

    }
    
    public function edit($id): void
    {
      $comment = Comment::getById($id);

      if (!empty($_POST)) {
        try {
            $comment->updateFromArray($_POST);
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('comments/edit.php', ['error'=>$e->getMessage(), 'comment'=>$comment]);
            return;
        }catch (ForbiddenException $e) {
            $this->view->renderHtml('errors/403.php', ['error'=>$e->getMessage()],403);
            return;
        }

        header ('Location: /www/articles/'.$comment->getArticleId().'#comment'.$comment->getId(), true, 302);
        exit();
    }

      $this->view->renderHtml('comments/edit.php', ['comment'=>$comment]);

    }

}