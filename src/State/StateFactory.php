<?php
namespace CaoMinhDuc\LivewireDatatable\State;

class StateFactory
{
    public function concrete(array $state, array $query = [])
    {
        $state = array_merge($state,$query);
        return new State($state);
    }
}