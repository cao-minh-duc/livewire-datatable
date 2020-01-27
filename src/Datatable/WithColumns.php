<?php
namespace CaoMinhDuc\LivewireDatatable\Datatable;

use CaoMinhDuc\LivewireDatatable\Column\Column;
use CaoMinhDuc\LivewireDatatable\Column\ColumnsFactory;


trait WithColumns
{
    protected function columns()
    {
        return [];
    }

    public function getColumnsProperty()
    {
        //factory columns
        $columns = app(ColumnsFactory::class)->concrete(
            $this->columns()
        );

        return $columns;
    }
}