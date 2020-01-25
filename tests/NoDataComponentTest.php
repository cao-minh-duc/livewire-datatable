<?php
namespace CaoMinhDuc\LivewireDatatable\Tests;

use Livewire\Livewire;
use Illuminate\Support\Str;
use CaoMinhDuc\LivewireDatatable\Columns\Column;
use CaoMinhDuc\LivewireDatatable\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use CaoMinhDuc\LivewireDatatable\Tests\Component\NoDataComponent;

class NoDataComponentTest extends TestCase
{
    protected function datatableClassname()
    {
        return NoDataComponent::class;
    }

    /** @test */
    public function can_render()
    {
        $this->assertContains(
            '<table',$this->getComponentDom($this->datatable)
        );
        $this->assertContains(
            '</table>',$this->getComponentDom($this->datatable)
        );
    }

    /** @test */
    public function show_message_when_no_records()
    {
        $this->assertContains(
            'No data available in table',$this->getComponentDom($this->datatable)
        );
    }

    /** @test */
    public function get_columns_property()
    {
        $this->assertEquals(
            $this->columns,
            $this->datatable->columns
        );
    }
}

