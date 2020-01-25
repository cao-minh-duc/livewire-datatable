<?php
namespace CaoMinhDuc\LivewireDatatable\Column;

use Illuminate\Support\Traits\Macroable;
class Column
{
    use Macroable;

    /** @var string */
    public $name;
    /** @var string */
    public $data;
    /** @var string */
    public $title;
    /** @var bool */
    public $searchable = true;
    /** @var bool */
    public $orderable = true;
    /** @var NULL|Closure */
    public $transform ;
    
    public function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->data = $attributes['data'] ?? NULL;
        $this->title = $attributes['title'];
        $this->searchable = $attributes['searchable'] ?? true;
        $this->orderable = $attributes['orderable'] ?? true;
        $this->transform = $attributes['transform'] ?? NULL;

        if(
            isset($attributes['transform'])
            && is_callable($attributes['transform'])
        )
        {
            self::macro(
                'transform_'.$this->name,
                $attributes['transform']
            );
        }
    }
}