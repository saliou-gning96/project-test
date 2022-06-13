<?php

namespace Tests\Application\Controller\ProductFavorite;

use App\Application\Product\SearchProduct;
use App\Application\ProductFavorite\CreateProductFavorite;
use App\Infrastructure\Controller\Product\SearchProductController;
use App\Infrastructure\Controller\ProductFavorite\CreateProductFavoriteController;
use App\Infrastructure\Entity\ProductFavorite;
use App\Infrastructure\Entity\User;
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

        $this->request->method('get')->willReturn('name');
    }

    public function testSearch()
    {
        /*
        $searchProductController = new SearchProductController($this->request);
        $response = $searchProductController->search($this->request);
        $this->assertEquals('Woolworths', $response['brands']);
        */
    }
}