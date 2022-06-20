<?php

namespace App\Domain\Manager;

use App\Domain\Interfaces\ProductFavoriteInterface;
use App\Infrastructure\Entity\ProductFavorite;

class ProductFavoriteManager
{

    public function __construct(private ProductFavoriteInterface $productFavoriteInterface)
    {}

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

    /**
     * @param ProductFavorite $productFavorite
     */
    public function remove($productFavorite): void
    {
        $this->productFavoriteInterface->remove($productFavorite, true);
    }
}
