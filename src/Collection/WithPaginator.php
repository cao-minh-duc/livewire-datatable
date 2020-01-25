<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

use CaoMinhDuc\LivewireDatatable\Paginator\Paginator;

trait WithPaginator
{
    /** @var Paginator */
    protected $paginator;

    /**
     * Get the value of paginator
     */ 
    public function getPaginator(): Paginator
    {
        return $this->paginator;
    }

    /**
     * Set the value of paginator
     *
     * @return  self
     */ 
    public function setPaginator(Paginator $paginator)
    {
        $this->paginator = $paginator;

        return $this;
    }
}