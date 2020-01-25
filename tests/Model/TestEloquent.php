<?php
namespace CaoMinhDuc\LivewireDatatable\Tests\Model;

use Illuminate\Database\Eloquent\Model;

class TestEloquent extends Model
{
    protected $table = 'test';

    public $guarded = ['id'];
}