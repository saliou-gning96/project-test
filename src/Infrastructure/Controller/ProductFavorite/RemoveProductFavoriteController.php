<?php

namespace App\Infrastructure\Controller\ProductFavorite;

use App\Application\ProductFavorite\DeleteProductFavorite;
use App\Infrastructure\Entity\ProductFavorite;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RemoveProductFavoriteController extends AbstractController
{
    private DeleteProductFavorite $deleteProductFavorite;

    public function __construct(DeleteProductFavorite $deleteProductFavorite)
    {
        $this->deleteProductFavorite = $deleteProductFavorite;
    }

    #[Rest\Delete(path: 'api/delete/{ean}', name: 'app_delete_product_favorite')]
    #[Rest\View]
    public function index(ProductFavorite $productFavorite)
    {
        return $this->deleteProductFavorite->remove($productFavorite);
    }
}
