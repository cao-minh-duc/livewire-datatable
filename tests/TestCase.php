<?php
namespace CaoMinhDuc\LivewireDatatable\Tests;

use Livewire\Livewire;
use TestEloquentFactory;
use Illuminate\Support\Str;
use Livewire\LivewireServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use CaoMinhDuc\LivewireDatatable\Column\Column;
use Orchestra\Testbench\TestCase as Orchestra;
use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use CaoMinhDuc\LivewireDatatable\LivewireDatatableServiceProvider;

abstract class TestCase extends Orchestra
{
    abstract protected function datatableClassname();

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
        $datatableClassName = $this->datatableClassname();
        $this->datatable = new $datatableClassName(Str::random(20));

        $this->columns = collect([
            new Column([
                'name' => 'id',
                'data' => 'id',
                'title' => 'Id',
            ]),
            new Column([
                'name' => 'string_column',
                'data' => 'string_column',
                'title' => 'String Column'
            ])
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireDatatableServiceProvider::class,
            LivewireServiceProvider::class,
        ];
    }

    protected function setUpDatabase()
    {
        Schema::create('test', function  (Blueprint $table){
            $table->increments('id');
            $table->string('string_column')->nullable();
            $table->timestamps();
        });
        $this->app->make(EloquentFactory::class)->load(__DIR__.'/factories');
        
    }

    protected function getComponentDom()
    {
        $view =  $this->datatable->render();
        return $view->render();
    }

    protected function assertDomContains($string)
    {
        $this->assertContains($string, $this->getComponentDom());
    }

    protected function createDefaultData($size = 1000)
    {
        factory(TestEloquent::class,$size)->create();
    }
}