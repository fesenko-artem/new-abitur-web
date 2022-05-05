<?php


namespace Vendor;

use Vendor\DI\DI;
abstract class Model
{
    protected $di;

    protected $db;

    protected $config;

    protected $queryBuilder;

    public $cache;

    const MASK_MODEL_ENTITY     = '\Vendor\Model\%s';

    public function __construct($di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get('db');
        $this->config  = $this->di->get('config');
        $this->queryBuilder = $this->di->get('queryBuilder');
        $this->cache = new Core\Cache\Cache();
    }

    public function init($model): bool
    {
        $modelName  = ucfirst($model);
        $namespaceModelRepository = sprintf(
            self::MASK_MODEL_ENTITY, $modelName
        );
        $isClassModel = class_exists($namespaceModelRepository);
        if ($isClassModel) {
            $this->{lcfirst($model)} = new $namespaceModelRepository;
        }
        return $isClassModel;
    }
}