<?php

namespace App\Infrastructure\Controller\ProductFavorite;

use App\Application\ProductFavorite\CreateProductFavorite;
use App\Infrastructure\Entity\ProductFavorite;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateProductFavoriteController extends AbstractController
{
    public function __construct(private CreateProductFavorite $createProductFavorite)
    {}

    #[Rest\Post(path: 'api/save', name: 'app_create_product_favorite')]
    #[Rest\View]
    #[ParamConverter('productFavorite', converter: 'fos_rest.request_body')]
    public function create(ProductFavorite $productFavorite)
    {
        return $this->createProductFavorite->create($productFavorite, $this->getUser());
    }
}
