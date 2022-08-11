<?php
namespace MyProject\Models\Comments;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\ForbiddenException;

class Comment extends ActiveRecordEntity
{
    /**@var string */
    protected $date;
    /**@var string */
    protected $text;
    /**@var int $userId */
    protected $authorId;
    /**@var int $articleId */
    protected $articleId;

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function getText():string
    {
        return $this->text;
    }

    public function getDate():string
    {
        return $this->date;
    }

    public static function createComment(array $fields, int $articleId, User $author): Comment
    {
        $comment = new Comment();
        $comment->setAuthorId($author);
        $comment->setText($fields['text']);
        $comment->setArticleId($articleId);
        $comment->save();
        return $comment;
    }

    public function setAuthorId(User $author):void
    {
        $this->authorId = $author->getId();
    }

    public function setText(string $text):void
    {
        $this->text = $text;
    }

    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }
    public function setDate(string $date):void
    {
        $this->date = $date;
    }

    public function getAuthor():User
    {
        return User::getById($this->authorId);
    }

    public function getArticleId():int
    {
        return $this->articleId;
    }

    public function isEdditable()
    {
        $user = UsersAuthService::getUserByToken();
        $author =  $this->getAuthor();

        if ($user !=null && ($user == $author || $user->isAdmin())) {
            return true;
        }
        return false;
    }

    public function updateFromArray(array $fields):Comment
    {
        $user = UsersAuthService::getUserByToken();

        if (!$this->isEdditable()) {
            throw new ForbiddenException("");            
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException("");
        }

        $this->setText($fields['text']);
        $this->setDate(date('Y-m-d H:i:s'));
        $this->save();
        return $this;
    }

  
}