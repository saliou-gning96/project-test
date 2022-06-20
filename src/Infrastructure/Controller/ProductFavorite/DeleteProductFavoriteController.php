<?php

namespace App\Infrastructure\Controller\ProductFavorite;

use App\Application\ProductFavorite\DeleteProductFavorite;
use App\Infrastructure\Entity\ProductFavorite;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteProductFavoriteController extends AbstractController
{

    public function __construct(private DeleteProductFavorite $deleteProductFavorite)
    {}

    #[Rest\Delete(path: 'api/delete/{ean}', name: 'app_delete_product_favorite')]
    #[Rest\View]
    public function delete(ProductFavorite $productFavorite)
    {
        return $this->deleteProductFavorite->remove($productFavorite);
    }
}
