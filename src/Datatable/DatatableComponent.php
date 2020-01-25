<?php
namespace CaoMinhDuc\LivewireDatatable\Datatable;

use Closure;
use Livewire\Component;
use Livewire\WithPagination;

abstract class DatatableComponent extends Component
{
    use WithCollection,
        WithColumns,
        WithPagination;

    public function render()
    {   
        $columns = $this->getColumnsProperty();
        $collection = $this->getCollectionProperty();
        $is_pagination = $collection instanceof \Illuminate\Pagination\LengthAwarePaginator;

        $recordTranform = function($record) use ($columns){
                
            foreach($columns as $column)
            {
                $methodTranform = 'transform_'.$column->name;

                if(!$column->hasMacro($methodTranform))
                {
                    continue;
                }
                $record->{$column->data} = $column->{$methodTranform}($record->{$column->data},$record);
            }

            return $record;
        };

        if($is_pagination)
        {
            $collection->getCollection()->transform($recordTranform);
        }else{
            $collection->transform($recordTranform);
        }
        return view('livewire-datatable::datatable',compact('columns','collection','is_pagination'));
    }
}