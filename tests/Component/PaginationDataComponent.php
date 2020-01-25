<?php
namespace CaoMinhDuc\LivewireDatatable\Tests\Component;

use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use CaoMinhDuc\LivewireDatatable\Datatable\DatatableComponent;

class PaginationDataComponent extends DatatableComponent
{

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