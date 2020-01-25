<?php
namespace CaoMinhDuc\LivewireDatatable\Tests\Component;

use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use CaoMinhDuc\LivewireDatatable\Datatable\DatatableComponent;

class EloquentDataComponent extends DatatableComponent
{
    public $paginator_config = [
        'enabled' => false,
        // 'per_page' => 10,
    ];

    public function adapterConfig()
    {
        return [
            'model' => new TestEloquent
        ];
    }

    protected function columns()
    {
        return [
            ['name'=>'id','data'=>'id','title'=>'Id'],
            ['name'=>'string_column','data'=>'string_column','title'=>'String Column'],
        ];
    }
}