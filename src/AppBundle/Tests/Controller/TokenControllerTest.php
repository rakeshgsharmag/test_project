<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TokenControllerTest extends WebTestCase
{
    public function testNewtoken()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/tokens');
    }

}
