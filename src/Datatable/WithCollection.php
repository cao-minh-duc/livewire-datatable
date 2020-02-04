<?php
namespace CaoMinhDuc\LivewireDatatable\Datatable;

use CaoMinhDuc\LivewireDatatable\State\StateFactory;
use CaoMinhDuc\LivewireDatatable\Collection\AdapterFactory;
use CaoMinhDuc\LivewireDatatable\Collection\EloquentAdapter;
use CaoMinhDuc\LivewireDatatable\Paginator\PaginatorFactory;

trait WithCollection
{
    protected function adapter()
    {
        return EloquentAdapter::class;
    }

    protected function adapterConfig()
    {
        return [];
    }

    public $paginator_config = [
        'enabled' => true,
        'per_page' => 10
    ];

    public function turnOffPagination()
    {
        $this->paginator_config['enable'] = false;
    }

    public $state = [];

    public function getCollectionProperty()
    {
        $paginator = app(PaginatorFactory::class)->concrete($this->paginator_config);
        $state = app(StateFactory::class)->concrete($this->state);

        $adapter = app(AdapterFactory::class)->concrete(
            $this->adapter(),
            $this->adapterConfig(),
            $paginator,
            $state
        );  

        $collection = $adapter->getCollection();
        
        return $collection;
    }
}