<?php


namespace AG\ApiBundle\Tests\Controller;


use FOS\RestBundle\Tests\Functional\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class FilesControllerTest extends WebTestCase
{
    public function testGetFilesAction()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/files/5');

        $response = $client->getResponse();

        $this->assertJsonResponse($response);
    }

    protected function assertJsonResponse(Response $response, $statusCode = 200)
    {
        $this->assertEquals(
            $statusCode, $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}