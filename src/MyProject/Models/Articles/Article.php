<?php
namespace MyProject\Models\Articles;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\Db;

class Article extends ActiveRecordEntity
{
    /**@var string $name */
    protected $name;
    
    /**@var string $text */
    protected $text;

    /**@var int $authorId */
    protected $authorId;

    /**@var string $createdAt*/
    protected $createdAt;

    public function getName():string
    {
        return $this->name;
    }

    public function getText(int $n=0):string
    {
        if ($n > 0) {
           return substr($this->text, 0, $n);
        } else {
            return $this->text;
        }
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public function getAuthor():User
    {
        return User::getByID($this->authorId);
    }

    public function setName(string $newName):void
    {
        $this->name = $newName;
    }

    public function setText(string $newText):void
    {
        $this->text = $newText;
    }

    public function setAuthor(User $author):void
    {
        $this->authorId = $author->getID();
    }
    
    public function setCreatedAt(string $date):void
    {
        $this->createdAt = $date;
    }

    public static function createFromArray(array $fields, User $author):Article
    {
        // if (!$author->isAdmin()) {
        //     throw new ForbiddenException("Вы не администратор!");            
        // }
        if (empty($fields['name'])) {
            throw new InvalidArgumentException("Нет названия статьи");
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException("Нет содержания статьи");
        }

        $article = new Article();
        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);
        $article->save();
        return $article;
    }

    public function updateFromArray(array $fields):Article
    {
        $user = UsersAuthService::getUserByToken();

        if (!$this->isEdditable()) {
            throw new ForbiddenException("Вы не администратор!");            
        }
        if (empty($fields['name'])) {
            throw new InvalidArgumentException("Нет названия статьи");
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException("Нет содержания статьи");
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);
        $this->save();
        return $this;
    }

    public function isEdditable(): bool
    {
        $user = UsersAuthService::getUserByToken();
        $author =  $this->getAuthor();

        if ($user !=null && ($user == $author || $user->isAdmin())) {
            return true;
        }
        return false;
    }

    public function getParsedText(int $n=0): string
    {
        $parser = new \Parsedown();
        return $parser->text($this->getText($n));
    }

    public static function getPageBefore(int $id, int $limit):array
    {
        $db = Db::getInstances();
        $sql = sprintf("SELECT * FROM (SELECT * FROM ".self::getTableName()." WHERE id > :id ORDER BY id ASC LIMIT %d) as articles ORDER BY id DESC;", $limit);
        return $db->query($sql, ['id'=>$id], self::class);
    }

    public static function getPageAfter(int $id, int $limit):array
    {
        $db = Db::getInstances();
        $sql = sprintf("SELECT * FROM ".self::getTableName()." WHERE id < :id ORDER BY id DESC LIMIT %d;", $limit);
        return $db->query($sql, ['id'=>$id], self::class);
    }

    public static function hasNextPage(int $pageLastId): bool
    {
        $db = Db::getInstances();
        $sql = 'SELECT id FROM '.self::getTableName(). ' WHERE id > :id LIMIT 1;';
        $result = $db->query($sql, ['id' => $pageLastId]);
        return !empty($result);
    }

    public static function hasPreviousPage(int $pageFirstId): bool
    {
        $db = Db::getInstances();
        $sql = 'SELECT * FROM '. self::getTableName() . ' WHERE id < :id LIMIT 1;';
        $result = $db->query($sql, ['id' => $pageFirstId]);
        return !empty($result);
    }

    public static function getLastId(): ?int
    {
        $db = Db::getInstances();
        $sql = 'SELECT * FROM '. self::getTableName() . ' ORDER BY id DESC LIMIT 1;';
        $result = $db->query($sql);
        return !empty($result) ? $result[0]->id : null;
    }
}