<?php

namespace App\Infrastructure\Controller\Product;

use App\Application\Product\SearchProduct;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SearchProductController extends AbstractController
{
    private SearchProduct $searchProduct;

    public function __construct(SearchProduct $searchProduct)
    {
        $this->searchProduct = $searchProduct;
    }

    #[Rest\Get(path: 'api/search', name: 'app_search_product')]
    #[Rest\View]
    public function search(Request $request)
    {
        return $this->searchProduct->search(
            $request->get('name'),
            $request->get('ean'),
            $request->get('marque'),
            $request->get('page')
        );
    }
}
