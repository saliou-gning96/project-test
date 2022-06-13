<?php

namespace Tests\Application\Controller\ProductFavorite;

use App\Application\Product\SearchProduct;
use App\Infrastructure\Controller\Product\SearchProductController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class SearchProductControllerControllerTest extends TestCase
{
    /**
     * @var SearchProduct
     */
    private $searchProduct;

    /**
     * @var Request
     */
    private $request;

    public function setUp(): void {
        $this->searchProduct = $this->getMockBuilder(SearchProduct::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->searchProduct->method('search')->willReturn(['brands' => 'Woolworths']);

        $this->request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->request->method('get')->willReturn(null);
    }

    public function testSearch()
    {
        $searchProductController = new SearchProductController($this->searchProduct);
        $response = $searchProductController->search($this->request);
        $this->assertEquals('Woolworths', $response['brands']);
    }
}