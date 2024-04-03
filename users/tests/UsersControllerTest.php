<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UsersControllerTest extends WebTestCase
{
    public function testRegistration(): void
    {
        $data = [
            "email"=> "ali.abbas@site.com",
            "firstName"=> "Ali",
            "lastName"=> "Abbas"
        ];
        $client = static::createClient();
        $client->setServerParameter('HTTP_HOST', 'localhost:8000');
        $client->jsonRequest('POST', '/users', $data);
        $statusCode = $client->getResponse()->getStatusCode();

        $this->assertResponseIsSuccessful();
        $this->assertEquals(201, $statusCode);
    }
}
