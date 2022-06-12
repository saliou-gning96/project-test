<?php

namespace Tests\Application\ProductFavorite;

use App\Application\ProductFavorite\DeleteProductFavorite;
use App\Infrastructure\Controller\ProductFavorite\DeleteProductFavoriteController;
use App\Infrastructure\Entity\ProductFavorite;
use PHPUnit\Framework\TestCase;

class DeleteProductFavoriteControllerTest extends TestCase
{
    /**
     * @var DeleteProductFavorite
     */
    private $deleteProductFavorite;

    public function setUp(): void {
        $this->deleteProductFavorite = $this->getMockBuilder(DeleteProductFavorite::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productFavorite = new ProductFavorite();
        $this->productFavorite->setEan('123');
        $this->deleteProductFavorite->method('remove')->willReturnCallback(function(){
            return null;
        });
    }

    public function testDelete()
    {
        $deleteProductFavoriteController = new DeleteProductFavoriteController($this->deleteProductFavorite);
        $this->assertNull($deleteProductFavoriteController->delete($this->productFavorite));
    }
}