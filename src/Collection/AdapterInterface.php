<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

use CaoMinhDuc\LivewireDatatable\State\State;
use CaoMinhDuc\LivewireDatatable\Paginator\Paginator;

interface AdapterInterface
{
    public function setPaginator(Paginator $paginator);

    public function getPaginator(): Paginator;

    public function setState(State $state);

    public function getState(): State;
}