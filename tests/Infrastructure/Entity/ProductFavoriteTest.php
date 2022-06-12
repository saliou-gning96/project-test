<?php

namespace Tests\Unit\Infrastructure\Entity;

use App\Infrastructure\Entity\ProductFavorite;
use App\Infrastructure\Entity\User;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Class ProductFavoriteTest.
 *
 * @covers \App\Infrastructure\Entity\ProductFavorite
 */
final class ProductFavoriteTest extends TestCase
{
    private ProductFavorite $productFavorite;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->productFavorite = new ProductFavorite();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->productFavorite);
    }

    public function testGetId(): void
    {
        $expected = 42;
        $property = (new ReflectionClass(ProductFavorite::class))
            ->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($this->productFavorite, $expected);
        $this->assertSame($expected, $this->productFavorite->getId());
    }

    public function testGetEan(): void
    {
        $expected = '42';
        $property = (new ReflectionClass(ProductFavorite::class))
            ->getProperty('ean');
        $property->setAccessible(true);
        $property->setValue($this->productFavorite, $expected);
        $this->assertSame($expected, $this->productFavorite->getEan());
    }

    public function testSetEan(): void
    {
        $expected = '42';
        $property = (new ReflectionClass(ProductFavorite::class))
            ->getProperty('ean');
        $property->setAccessible(true);
        $this->productFavorite->setEan($expected);
        $this->assertSame($expected, $property->getValue($this->productFavorite));
    }

    public function testGetUser(): void
    {
        $expected = $this->getMockBuilder(User::class)->getMock();
        $property = (new ReflectionClass(ProductFavorite::class))
            ->getProperty('user');
        $property->setAccessible(true);
        $property->setValue($this->productFavorite, $expected);
        $this->assertSame($expected, $this->productFavorite->getUser());
    }

    public function testSetUser(): void
    {
        $expected = $this->getMockBuilder(User::class)->getMock();
        $property = (new ReflectionClass(ProductFavorite::class))
            ->getProperty('user');
        $property->setAccessible(true);
        $this->productFavorite->setUser($expected);
        $this->assertSame($expected, $property->getValue($this->productFavorite));
    }
}
