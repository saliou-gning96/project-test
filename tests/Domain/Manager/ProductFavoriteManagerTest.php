<?php

namespace Tests\Domain\Manager;

use App\Domain\Interfaces\ProductFavoriteInterface;
use App\Domain\Manager\ProductFavoriteManager;
use App\Infrastructure\Entity\ProductFavorite;
use PHPUnit\Framework\TestCase;

class ProductFavoriteManagerTest extends TestCase
{
    /**
     * @var ProductFavorite
     */
    private $productFavorite;

    /**
     * @var ProductFavoriteInterface
     */
    private $productFavoriteInterface;

    public function setUp(): void {
        $this->productFavoriteInterface = $this->getMockBuilder(ProductFavoriteInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productFavorite = new ProductFavorite();
        $this->productFavorite->setEan('123');
    }

    public function testCreate()
    {
        $this->productFavoriteInterface->method('add')->willReturn($this->productFavorite);
        $productFavoriteManager = new ProductFavoriteManager($this->productFavoriteInterface);
        $response = $productFavoriteManager->create($this->productFavorite);
        $this->assertEquals('123', $response->getEan());
    }

    public function testRemove()
    {
        $this->productFavoriteInterface->method('remove')->willReturnCallback(function(){
            return null;
        });
        $productFavoriteManager = new ProductFavoriteManager($this->productFavoriteInterface);
        $this->assertNull($productFavoriteManager->remove($this->productFavorite));
    }
}