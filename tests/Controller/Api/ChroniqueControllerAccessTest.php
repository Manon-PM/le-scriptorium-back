<?php

namespace App\Tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChroniqueControllerAccessTest extends WebTestCase
{   
    /**
     * Undocumented function
     *
     * @dataProvider getRoutes
     */
    public function testJsonResponseOk($route): void
    {
        $client = static::createClient();
        $client->request('GET', $route);
        $response = $client->getResponse();
        $this->assertTrue($response->headers->contains('Content-Type', 'application/json'));
    }

    public function getRoutes()
    {
        yield ['/api/classes'];
        yield ['/api/races'];
        yield ['/api/ways/2'];
        yield ['/api/stats'];
        yield ['/api/religions'];
    }

    /*
    public function testClasses()
    {
        $client = static::createClient();
        $client->request('GET', '/api/classes');

        $response = $client->getResponse();

        $classes = json_decode($response->getContent(), true);
        dd($classes);

        $test = $this->assertTrue(array_key_exists(0, $classes));
        dd($test);
        $this->assertArrayHasKey('name', $classes);
        $this->assertArrayHasKey('description', $classes);


    }*/
}
