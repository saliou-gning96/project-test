<?php

namespace Tests\Application\Controller\ProductFavorite;

use App\Application\ProductFavorite\CreateProductFavorite;
use App\Infrastructure\Controller\ProductFavorite\CreateProductFavoriteController;
use App\Infrastructure\Entity\ProductFavorite;
use App\Infrastructure\Entity\User;
use PHPUnit\Framework\TestCase;

class CreateProductFavoriteControllerTest extends TestCase
{
    /**
     * @var CreateProductFavorite
     */
    private $createProductFavorite;

    public function setUp(): void {
        $this->createProductFavorite = $this->getMockBuilder(CreateProductFavorite::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productFavorite = new ProductFavorite();
        $this->productFavorite->setEan('123');
        $this->createProductFavorite->method('create')->willReturn($this->productFavorite);
    }

    public function testCreate()
    {
        /*
        $createProductFavoriteController = new CreateProductFavoriteController($this->createProductFavorite);
        $response = $createProductFavoriteController->create($this->productFavorite, new User());
        $this->assertEquals('123', $response->getEan());
        */
    }
}