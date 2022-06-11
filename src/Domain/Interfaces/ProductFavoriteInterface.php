<?php

namespace App\Domain\Interfaces;

use App\Infrastructure\Entity\ProductFavorite;

interface ProductFavoriteInterface
{
    public function findAll();

    public function add(ProductFavorite $entity, bool $flush = false): ProductFavorite;
}
