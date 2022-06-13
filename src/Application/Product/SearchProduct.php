<?php

namespace App\Application\Product;

use App\Domain\Services\HttpClientService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SearchProduct
{
    private HttpClientService $httpClientService;

    public function __construct(
        HttpClientService $httpClientService
    )
    {
        $this->httpClientService = $httpClientService;
    }

    public function search(?string $name, ?string $ean, ?string $marque, ?int $page = 1)
    {
        $i = 0;
        $page_size = 20;

        if ($page) {
            $page_size = "20/$page";
        }

        $params = [
            'action' => 'process',
            'json' => true,
            'sort_by' => 'product_name',
            'page_size' => $page_size,
            'page' => $page ? $page : 1
        ];

        if ($name && $name !== '') {
            $params["tagtype_$i"] = 'labels';
            $params["tag_contains_$i"] = 'contains';
            $params["tag_$i"] = $marque;
            $i++;
        }

        if ($ean && $ean !== '') {
            $params["tagtype_$i"] = 'categories';
            $params["tag_contains_$i"] = 'contains';
            $params["tag_$i"] = $ean;
            $i++;
        }

        if ($marque && $marque !== '') {
            $params["tagtype_$i"] = 'brands';
            $params["tag_contains_$i"] = 'contains';
            $params["tag_$i"] = $marque;
        }

        if ($name === '' && $ean === '' && $marque === '') {
            throw new NotFoundHttpException('Veuillez ajouter au moins un critère');
        }

        return $this->httpClientService->searchProduit($params);
    }
}
