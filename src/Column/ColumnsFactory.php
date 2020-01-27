<?php
namespace CaoMinhDuc\LivewireDatatable\Column;

use Illuminate\Support\Collection;

class ColumnsFactory
{
    public function __construct()
    {

    }

    public function concrete(
        $columnsAttributes = []
    ): Collection
    {
        $columns = new Collection($columnsAttributes);
        $columns = $columns->map(function($columnAttributes){
            $column = new Column($columnAttributes);
            return $column;
        });

        return $columns;
    }
}