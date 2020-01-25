<?php
namespace CaoMinhDuc\LivewireDatatable\Tests;

use Livewire\Livewire;
use CaoMinhDuc\LivewireDatatable\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use CaoMinhDuc\LivewireDatatable\Tests\Component\EloquentDataComponent;

class EloquentDataComponentTest extends TestCase
{
    use RefreshDatabase;

    protected function datatableClassname()
    {
        return EloquentDataComponent::class;
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function can_render_collection()
    {   
        $this->createDefaultData();
        $this->assertEquals(
            TestEloquent::all()->toArray(),
            $this->datatable->collection->toArray()
        );

        $this->assertNotContains(
            'No data available in table',
            $this->getComponentDom($this->datatable)
        );
    }

    


}