<?php

namespace Tests\Tp\FdjBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    /**
     * @dataProvider getProductsData
     */
    public function testGetProducts($httpMethod, $url, $statusCode)
    {
        $client = static::createClient();

        $client->request($httpMethod, $url);
        $this->assertSame($statusCode, $client->getResponse()->getStatusCode());
    }

    public function getProductsData()
    {
        yield ['GET', '/v1/products', 200];
        yield ['GET', '/v1/products/0', 200];
        yield ['GET', '/v1/products/1', 200];
    }
}
