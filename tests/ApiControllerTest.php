<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/api/blogs');

        $this->assertTrue($client->getResponse()->isSuccessful() || $client->getResponse()->isNotFound());

        if ($client->getResponse()->isSuccessful())
            $this->assertContains('data', $client->getResponse()->getContent());
    }

    public function testShow()
    {
        $client = static::createClient();

        $client->request('GET', '/api/blogs/1');

        $this->assertTrue($client->getResponse()->isSuccessful() || $client->getResponse()->isNotFound());

        if ($client->getResponse()->isSuccessful())
            $this->assertContains('data', $client->getResponse()->getContent());
    }
}