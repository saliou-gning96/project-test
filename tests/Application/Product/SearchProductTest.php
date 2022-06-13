<?php

namespace Tests\Application\Product;

use App\Application\Product\SearchProduct;
use App\Domain\Services\HttpClientService;
use PHPUnit\Framework\TestCase;

class SearchProductTest extends TestCase
{
    /**
     * @var HttpClientService
     */
    private $httpClientService;

    public function setUp(): void {
        $this->httpClientService = $this->getMockBuilder(HttpClientService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->httpClientService->method('searchProduit')->willReturn(['brands' => 'Woolworths']);
    }

    public function testSearch()
    {
        $createProductFavorite = new SearchProduct($this->httpClientService);
        $response = $createProductFavorite->search('name', 'ean', 'search');
        $this->assertEquals('Woolworths', $response['brands']);
    }
}