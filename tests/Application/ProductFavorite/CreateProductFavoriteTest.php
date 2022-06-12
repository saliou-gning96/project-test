<?php

namespace Tests\Application\ProductFavorite;

use App\Application\ProductFavorite\CreateProductFavorite;
use App\Domain\Manager\ProductFavoriteManager;
use App\Domain\Services\HttpClientService;
use App\Infrastructure\Entity\ProductFavorite;
use App\Infrastructure\Entity\User;
use PHPUnit\Framework\TestCase;

class CreateProductFavoriteTest extends TestCase
{
    /**
     * @var ProductFavorite
     */
    private $productFavorite;

    /**
     * @var ProductFavoriteManager
     */
    private $productFavoriteManager;

    /**
     * @var HttpClientService
     */
    private $httpClientService;

    public function setUp(): void {
        $this->productFavoriteManager = $this->getMockBuilder(ProductFavoriteManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productFavorite = new ProductFavorite();
        $this->productFavorite->setEan('123');
        $this->productFavoriteManager->method('create')->willReturn($this->productFavorite);

        $this->httpClientService = $this->getMockBuilder(HttpClientService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->httpClientService->method('checkProductByCode')->willReturn(true);
    }

    public function testCreate()
    {
        $createProductFavorite = new CreateProductFavorite($this->productFavoriteManager, $this->httpClientService);
        $response = $createProductFavorite->create($this->productFavorite, new User());
        $this->assertEquals('123', $response->getEan());
    }
}