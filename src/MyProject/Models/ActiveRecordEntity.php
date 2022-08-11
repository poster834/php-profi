<?php
namespace MyProject\Models;
use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCase = $this->under_score_ToCamelCase($name);
        $this->$camelCase = $value;
    }
    
    private function under_score_ToCamelCase(string $source):string
    {
        return lcfirst(str_replace('_','',ucwords($source, '_')));
    }

    private function camelCaseTo_under_score(string $source):string
    {
        return strtolower(preg_replace('~(?<!^)[A-Z]~','_$0',$source));
    }

    /**@return [] */
    public static function findAll(): array
    {
        $db = Db::getInstances();
        return $db->query('SELECT * FROM `'.static::getTableName().'`;', [], static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstances();
        $entities = $db->query('SELECT * FROM `'.static::getTableName().'` WHERE `id` = :id;', [':id'=>$id], static::class);
        return $entities ? $entities[0]:null;
    }

    private function mapPropertiesToDBFormat():array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseTo_under_score($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        return $mappedProperties;
    }

    public function save():void
    {
       $mappedProperties = $this->mapPropertiesToDBFormat();
       if ($this -> id === null) {
        $this->insert($mappedProperties);
       } else {
        $this->update($mappedProperties);
       }
    }

    private function insert(array $mappedProperties):void
    {       
        $columnsToParams = [];
        $paramsToValues = [];
        $index = 1;
        $mappedProperties = array_filter($mappedProperties);

        foreach ($mappedProperties as $column => $value)
        {
         $param = ':param' . $index;
         $columnsToParams[] = $column . ' = ' . $param;
         $paramsToValues[$param] = $value;
         $index ++;
        }
     
        $sql = 'INSERT INTO '. static::getTableName() . ' SET '. implode(', ', $columnsToParams).'';
        $db = Db::getInstances();
        $db->query($sql, $paramsToValues); 
        $this->id = $db->getLastInsertId();       
    }

    private function update(array $mappedProperties):void
    {
       $columnsToParams = [];
       $paramsToValues = [];
       $index = 1;

       foreach ($mappedProperties as $column => $value)
       {
        $param = ':param' . $index;
        $columnsToParams[] = $column . ' = ' . $param;
        $paramsToValues[$param] = $value;
        $index ++;
       }

       $sql = 'UPDATE '. static::getTableName() . ' SET '. implode(', ', $columnsToParams) . ' WHERE id = ' . $this->id;
       $db = Db::getInstances();
       $db->query($sql, $paramsToValues, static::class);

    }

    public function delete():void
    {
        $sql = 'DELETE FROM '. static::getTableName() . ' WHERE id = :id';
        $db = Db::getInstances();
        $db->query($sql, [':id' => $this->id], static::class);
        $this->id = null;
    }

    public static function findOneByColumn(string $columnName, $value):?self
    {
        $sql = 'SELECT * FROM '. static::getTableName() . ' WHERE `'.$columnName.'` = :value LIMIT 1;';
        $db = Db::getInstances();
        $result = $db->query($sql, [':value' => $value], static::class);

        if ($result === []) {
            return null;
        }
        return $result[0];
    }

    public static function findLastAddedByColumn(string $columnName, $value):?self
    {
        $sql = 'SELECT * FROM '. static::getTableName() . ' WHERE `'.$columnName.'` = :value ORDER BY id DESC LIMIT 1;';
        $db = Db::getInstances();
        $result = $db->query($sql, [':value' => $value], static::class);

        if ($result === []) {
            return null;
        }
        return $result[0];
    }

    abstract protected static function getTableName():string;


}
