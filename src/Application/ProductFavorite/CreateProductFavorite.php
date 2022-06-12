<?php

namespace App\Application\ProductFavorite;

use App\Domain\Services\HttpClientService;
use App\Domain\Manager\ProductFavoriteManager;
use App\Infrastructure\Entity\ProductFavorite;

class CreateProductFavorite
{
    private ProductFavoriteManager $productFavoriteManager;
    private HttpClientService $httpClientService;

    public function __construct(
        ProductFavoriteManager $productFavoriteManager,
        HttpClientService $httpClientService
    )
    {
        $this->productFavoriteManager = $productFavoriteManager;
        $this->httpClientService = $httpClientService;
    }

    public function create($productFavorite, $user): ProductFavorite
    {
        if ($this->httpClientService->checkProductByCode($productFavorite->getEan())) {
            $productFavorite->setUser($user);   
        }

        return $this->productFavoriteManager->create($productFavorite);
    }
}
