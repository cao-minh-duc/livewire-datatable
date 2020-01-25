<?php
namespace CaoMinhDuc\LivewireDatatable\Tests\Component;

use CaoMinhDuc\LivewireDatatable\Datatable\DatatableComponent;

class NoDataComponent extends DatatableComponent
{

    public function getCollectionProperty()
    {
        return collect([]);
    }

    protected function columns()
    {
        return [
            ['name'=>'id','data'=>'id','title'=>'Id'],
            ['name'=>'string_column','data'=>'string_column','title'=>'String Column'],
        ];
    }
}