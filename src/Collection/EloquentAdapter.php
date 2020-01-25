<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

class EloquentAdapter implements AdapterInterface
{
    use WithPaginator,WithState;
    
    private $model;
    public function __construct(
        array $config
    )
    {
        $this->setModel($config['model']);
    }

    public function getCollection()
    {
        $model = $this->getModel();
        if($this->getPaginator()->isDisabled())
        {
            return $model->all();
        }

        $collection = $model->paginate($this->getPaginator()->getPerPage());

        return $collection;

        
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }
}