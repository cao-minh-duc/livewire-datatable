<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class EloquentAdapter implements AdapterInterface
{
    use WithPaginator,WithState;
    
    private $model;

    /**
     *
     * @var array|string
     */
    private $allowed_filters;


    public function __construct(
        array $config
    )
    {
        $this->setModel($config['model']);
        $this->setAllowedFilters($config['allowed_filters'] ?? []);
    }

    public function getCollection()
    {
        $model = $this->getModel();

        $query = $model instanceof Builder
                    ? $model
                    : $model->query();
                    
        $queryBuilder = QueryBuilder::for($query, new Request(['filter' => ['status' => 'finish']]))
                            ->allowedFilters(
                                $this->getAllowedFilters()
                            );
        if($this->getPaginator()->isDisabled())
        {
            return $queryBuilder->get();
        }

        $collection = $queryBuilder->paginate(
            $this->getPaginator()->getPerPage()
        );

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

    /**
     * Get the value of allowed_filters
     *
     * @return  array|string
     */ 
    public function getAllowedFilters()
    {
        return $this->allowed_filters;
    }

    /**
     * Set the value of allowed_filters
     *
     * @param  array|string  $allowed_filters
     *
     * @return  self
     */ 
    public function setAllowedFilters($allowed_filters)
    {
        $this->allowed_filters = $allowed_filters;

        return $this;
    }
}