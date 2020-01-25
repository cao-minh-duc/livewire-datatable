<?php
namespace CaoMinhDuc\LivewireDatatable\Tests;

use CaoMinhDuc\LivewireDatatable\Column\Column;
use CaoMinhDuc\LivewireDatatable\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use CaoMinhDuc\LivewireDatatable\Tests\Component\TransformDataComponent;

class TransformDataComponentTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->records_before_transform = [
            [
                'string_column' => 'foo'
            ]
        ];
        $this->records_after_transform = [
            [
                'string_column' => 'FOO'
            ]
        ];
    }

    protected function datatableClassname()
    {
        return TransformDataComponent::class;
    }

    /** @test */
    public function column_can_transform_data()
    {
        $column =  new Column([
            'name' => 'name',
            'data' => 'data',
            'title' => 'Name',
            'transform' => function($value,$record){
                return strtoupper($value);
            }
        ]);

        $this->assertEquals(
            'FOO',
            $column->transform_name('foo',[])
        );
    }



    /** @test */
    public function when_pagination_should_transform()
    {
        TestEloquent::insert($this->records_before_transform);
        $this->assertDomContains(
            'FOO'
        );

        $this->datatable->turnOffPagination();

        $this->assertDomContains(
            'FOO'
        );
    }

    /** @test */
    public function when_not_pagination_should_transform()
    {
        TestEloquent::insert($this->records_before_transform);

        $this->datatable->paginator_config['enabled'] = false;

        $this->assertDomContains(
            'FOO'
        );
    }
}