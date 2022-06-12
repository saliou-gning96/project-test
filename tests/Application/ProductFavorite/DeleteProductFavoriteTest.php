<?php

namespace Tests\Application\ProductFavorite;

use App\Application\ProductFavorite\DeleteProductFavorite;
use App\Domain\Manager\ProductFavoriteManager;
use App\Infrastructure\Entity\ProductFavorite;
use PHPUnit\Framework\TestCase;

class DeleteProductFavoriteTest extends TestCase
{
    /**
     * @var ProductFavorite
     */
    private $productFavorite;

    /**
     * @var ProductFavoriteManager
     */
    private $productFavoriteManager;

    public function setUp(): void {
        $this->productFavoriteManager = $this->getMockBuilder(ProductFavoriteManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productFavoriteManager->method('remove')->willReturnCallback(function(){
            return null;
        });
    }

    public function testCreate()
    {
        $deleteProductFavorite = new DeleteProductFavorite($this->productFavoriteManager);
        $this->assertNull($deleteProductFavorite->remove($this->productFavorite));
    }
}