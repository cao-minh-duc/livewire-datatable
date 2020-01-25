<?php
namespace CaoMinhDuc\LivewireDatatable\Paginator;

class PaginatorFactory
{
    public function concrete(array $config = [])
    {
        return new Paginator($config);
    }
}