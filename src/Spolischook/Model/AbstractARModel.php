<?php

namespace Spolischook\Model;

abstract class AbstractARModel
{
    private $dbName = 'mvc';

    /** @var  \MongoClient */
    private $client;

    private $class;

    /** @var  \MongoId */
    protected $_id;

    public function __construct()
    {
        $this->class = self::getClass();
        $this->_id   = new \MongoId();
    }

    /**
     * @return \MongoId|null
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string MongoDB collection name where model will be stored
     */
    public function getModelCollectionName()
    {
        $classParts = explode('\\', $this->class);
        $className = array_pop($classParts);

        return $this->fromCamelCase($className);
    }

    /**
     * @param array $definition
     * @return self
     */
    public static function getFromArray(array $definition)
    {
        $class = self::getClass();
        $model = new $class;

        foreach ($definition as $key => $value)
        {
            $model->$key = $value;
        }

        return $model;
    }

    public function save()
    {
        $collection = $this->getCollection();
        $document = $this->prepareToSave();

        $collection->insert($document);
    }

    public static function findOne($id)
    {
        $class = self::getClass();

        /** @var AbstractARModel $model */
        $model = new $class;

        return $model->getCollection()->findOne(array('_id' => new \MongoId($id)));
    }

    public static function findAll()
    {
        $class = self::getClass();

        /** @var AbstractARModel $model */
        $model = new $class;

        return $model->getCollection()->find();
    }

    public static function delete($id)
    {
        $class = self::getClass();

        /** @var AbstractARModel $model */
        $model = new $class;

        return $model->getCollection()->remove(array('_id' => new \MongoId($id)));
    }

    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }

    /**
     * @return \MongoClient
     */
    private function getClient()
    {
        if (!$this->client) {
            $this->client = new \MongoClient();
        }

        return $this->client;
    }

    /**
     * @return \MongoCollection
     */
    private function getCollection()
    {
        return $this->getClient()->selectCollection($this->dbName, $this->getModelCollectionName());
    }

    private function fromCamelCase($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    private function prepareToSave()
    {
        $reflect = new \ReflectionClass(get_class($this));
        $classVars = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);

        foreach ($classVars as $prop) {
            $doc[$prop->getName()] = $this->{$prop->getName()};
        }

        return $doc;
    }
}
