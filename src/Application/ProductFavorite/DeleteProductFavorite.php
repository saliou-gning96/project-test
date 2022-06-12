<?php

namespace App\Application\ProductFavorite;

use App\Domain\Services\HttpClientService;
use App\Domain\Manager\ProductFavoriteManager;
use App\Infrastructure\Entity\ProductFavorite;

final class DeleteProductFavorite
{
    private ProductFavoriteManager $productFavoriteManager;

    public function __construct(
        ProductFavoriteManager $productFavoriteManager
    )
    {
        $this->productFavoriteManager = $productFavoriteManager;
    }

    public function remove($productFavorite): void
    {
        $this->productFavoriteManager->remove($productFavorite);
    }
}
