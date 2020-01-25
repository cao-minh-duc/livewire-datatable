<?php
namespace CaoMinhDuc\LivewireDatatable\Collection;

use CaoMinhDuc\LivewireDatatable\State\State;

trait WithState
{
    /** @var State */
    protected $state;

    /**
     * Get the value of state
     */ 
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState(State $state)
    {
        $this->state = $state;

        return $this;
    }
}