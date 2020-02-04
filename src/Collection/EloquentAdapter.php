<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

use Spatie\QueryBuilder\QueryBuilder;

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
        $query = $this->getModel()->query();

        $queryBuilder = QueryBuilder::for($query);
        if($this->getPaginator()->isDisabled())
        {
            return $queryBuilder->get();
        }

        $collection = $queryBuilder->paginate($this->getPaginator()->getPerPage());

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