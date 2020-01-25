<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

use CaoMinhDuc\LivewireDatatable\Paginator\Paginator;
use CaoMinhDuc\LivewireDatatable\State\State;

class AdapterFactory
{
    public function concrete(
        $adapterClassname,
        $config,
        Paginator $paginator,
        State $state
    ){
        $adapter = new $adapterClassname(
            $config
        );
        $adapter->setPaginator($paginator);
        $adapter->setState($state);
        return $adapter;
    }
}