<?php
namespace CaoMinhDuc\LivewireDatatable\Paginator;

class Paginator
{
    private $enabled = true;

    private $per_page = false;

    public function __construct(array $config = [])
    {
        $this->enabled = $config['enabled'] ?? false;
        $this->per_page = $config['per_page'] ?? 10;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    public function isDisabled()
    {
        return !$this->enabled;
    }

    public function disable()
    {
        $this->enabled = false;
    }

    public function getPerPage()
    {
        return $this->per_page;
    }
}