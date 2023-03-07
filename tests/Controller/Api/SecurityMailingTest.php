<?php

namespace App\Tests\Controller\Api;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityMailingTest extends WebTestCase
{
    // public function testSomething(): void
    // {
    //     $client = static::createClient();
    //     $client->getRequest('POST', '/reset-password');
    //     $response = $client->getResponse();
    //     dd($response);
    //     //$this->assertResponseIsSuccessful();
    //     $this->assertEmailCount(1, 'ok');
    // }
    public function testMailSend()
    {
        $client = static::createClient();
        
        //On accède au UserRepository
        $userRepository = static::getContainer()->get(UserRepository::class);

        //Je récupère un utilisateur pour le connecter
        $testUser = $userRepository->findOneByEmail('freir@gmail.com');
        
        // on simule une connexion avec cet utilisateur
        $pourDD=$client->loginUser($testUser);
        
        //dd($pourDD);
        $client->request('GET','/api/resend-activation');

        //$this->assertResponseIsSuccessful();
        
        $this->assertEmailCount(1);

    }
}
