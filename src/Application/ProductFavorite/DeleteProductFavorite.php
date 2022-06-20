<?php

namespace App\Application\ProductFavorite;

use App\Domain\Services\HttpClientService;
use App\Domain\Manager\ProductFavoriteManager;
use App\Infrastructure\Entity\ProductFavorite;

class DeleteProductFavorite
{
    public function __construct(
        private ProductFavoriteManager $productFavoriteManager
    )
    {}

    public function remove($productFavorite): void
    {
        $this->productFavoriteManager->remove($productFavorite);
    }
}
