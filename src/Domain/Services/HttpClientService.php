<?php

namespace App\Domain\Services;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class HttpClientService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws BadRequestException
     * @throws NotFoundHttpException
     * @return boolean
     */
    public function checkProductByCode(string $code)
    {
        $params = ['code' => $code, 'fields' => 'code,product_name'];
        $url = 'https://world.openfoodfacts.org/api/v2/search?' . http_build_query($params);

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
}
