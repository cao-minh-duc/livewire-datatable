<?php
namespace CaoMinhDuc\LivewireDatatable\State;

class StateFactory
{
    public function concrete(array $state)
    {
        return new State($state);
    }
}