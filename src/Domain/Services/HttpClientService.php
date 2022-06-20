<?php

namespace App\Domain\Services;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientService
{

    public function __construct(private HttpClientInterface $client)
    {}

    /**
     * @throws BadRequestException
     * @throws NotFoundHttpException
     * @return boolean
     */
    public function checkProductByCode(string $code)
    {
        $params = ['code' => $code, 'fields' => 'code,product_name'];
        $url = 'https://fr.openfoodfacts.org/api/v2/search?' . http_build_query($params);

        $response = $this->client->request(
            'GET',
            $url
        );

        if ($response->getStatusCode() !== 200) {
            throw new BadRequestException('Le serveur openfoodfacts réponds pas.');
        }

        $content = $response->toArray();

        if ($content['count'] !== 1) {
            throw new NotFoundHttpException('Produit non trouvé dans openfoodfacts');
        }

        return true;
    }

    public function searchProduit($params) {
        $url = 'https://fr.openfoodfacts.org/cgi/search.pl?' . http_build_query($params);

        $response = $this->client->request(
            'GET',
            $url
        );

        if ($response->getStatusCode() !== 200) {
            throw new BadRequestException('Le serveur openfoodfacts réponds pas.');
        }

        return $response->toArray();
    }
}
