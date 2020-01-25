<?php
namespace CaoMinhDuc\LivewireDatatable\Datatable;

use CaoMinhDuc\LivewireDatatable\Column\Column;


trait WithColumns
{
    public function getColumnsProperty()
    {
        //factory columns
        $columns = array_map(function($columnAttributes){
            
            $column = new Column($columnAttributes);
            if(isset($columnAttributes['transform']))
            {
                // dd(null === $column->transform);
            }
            return $column;
        },$this->columns());
        return collect($columns ?? []);
    }
}