<?php

namespace App\Domain\Manager;

use App\Domain\Interfaces\ProductFavoriteInterface;
use App\Infrastructure\Entity\ProductFavorite;

final class ProductFavoriteManager
{
    private ProductFavoriteInterface $productFavoriteInterface;

    public function __construct(ProductFavoriteInterface $productFavoriteInterface)
    {
        $this->productFavoriteInterface = $productFavoriteInterface;
    }

    public function getAll()
    {
        return $this->productFavoriteInterface->findAll();
    }

    /**
     * @param ProductFavorite $productFavorite
     */
    public function create($productFavorite): ProductFavorite
    {
        return $this->productFavoriteInterface->add($productFavorite, true);
    }
}
