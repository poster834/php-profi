<?php
namespace MyProject\Services;

use PDO;
use PDOException;
use MyProject\Exceptions\DbException;

class Db
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $dbOptions = (require __DIR__.'/../../settings.php')['db'];
        try {
            $this->pdo = new PDO(
                'mysql:host='.$dbOptions['host'].'; dbname='.$dbOptions['dbname'], 
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
        } catch (PDOException $e) {
            throw new DbException("Ошибка при подключении к базе данных:" . $e->getMessage());   
        }
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        var_dump($sql);
        echo "<br>";
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false) {
            return null;
        }
        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public static function getInstances():self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        } 
        return self::$instance;
    }

    public function getLastInsertId():int
    {
        return (int) $this->pdo->lastInsertId();
    }

}