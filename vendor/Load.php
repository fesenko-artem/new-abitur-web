<?php


namespace Vendor;

use stdClass;
use Vendor\DI\DI;
class Load
{
    //Загрузка Моделей и Репозиториев к моделям
    const MASK_MODEL_ENTITY     = '\Vendor\Model\%s';
    const MASK_MODEL_REPOSITORY = '\%s\ModelRepository\%sRepository';
    const MASK_MODEL_FORM  = '\%s\Form\%s';


    /**
     * @var DI
     */
    public $di;

    public function __construct(DI $di)
    {
        $this->di = $di;

        return $this;
    }
    public function model($modelName, bool $modelDir = false, bool $env = false)
    {
        $modelName  = ucfirst($modelName);
        $modelDir   = $modelDir ? $modelDir : $modelName;
        $env        = $env ? $env : ENV;

        $namespaceModelRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            ENV, $modelName
        );
        $isClassModel = class_exists($namespaceModelRepository);

        if ($isClassModel) {
            // Set to DI
            $modelRegistry = $this->di->get('model') ?: new stdClass();
            $modelRegistry->{lcfirst($modelName)} = new $namespaceModelRepository($this->di);

            $this->di->set('model', $modelRegistry);
        }
        return $isClassModel;
    }

    public function form($modelName, bool $env = false)
    {
        $modelName  = ucfirst($modelName);
        $env        = $env ? $env : ENV;

        $namespaceModel = sprintf(
            self::MASK_MODEL_FORM,
            ENV, $modelName
        );

        $isClassModel = class_exists($namespaceModel);
        if ($isClassModel) {
            // Set to DI
            $modelRegistry = $this->di->get('form') ?: new stdClass();
            $modelRegistry->{lcfirst($modelName)} = new $namespaceModel($this->di);

            $this->di->set('form', $modelRegistry);
        }
        return $isClassModel;
    }
    private function toCamelCase(string $str)
    {
        $replace = preg_replace('/[^a-zA-Z0-9]/', ' ', $str);
        $convert = mb_convert_case($replace, MB_CASE_TITLE);
        $result  = lcfirst(str_replace(' ', '', $convert));

        return $result;
    }
}