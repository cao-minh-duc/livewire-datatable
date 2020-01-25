<?php
namespace CaoMinhDuc\LivewireDatatable\Tests;

use CaoMinhDuc\LivewireDatatable\Tests\Model\TestEloquent;
use CaoMinhDuc\LivewireDatatable\Tests\Component\PaginationDataComponent;

class PaginationDataComponentTest extends TestCase
{

    const PER_PAGE_DEFAULT = 10;
    protected function datatableClassName()
    {
        return PaginationDataComponent::class;
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function can_render_pagination()
    {
        $this->createDefaultData();
        $this->assertDomContains('wire:click="gotoPage');
    }

    /** @test */
    public function can_go_to_page()
    {
        $this->createDefaultData();

        $per_page = self::PER_PAGE_DEFAULT;
        $page = 2;

        $this->datatable->goToPage(2);

        $this->assertEquals(
            TestEloquent::paginate($per_page,['*'],'page',$page)->toArray(),
            $this->datatable->collection->toArray()
        );
    }

}