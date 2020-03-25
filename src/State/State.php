<?php
namespace CaoMinhDuc\LivewireDatatable\State;

class State
{
    /** @var array */
    public $filter;
    public function __construct(array $state)
    {
        $this->filter = $state['filter'] ?? [];
    }
}