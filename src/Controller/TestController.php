<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function fetchRandomUserData(HttpClientInterface $httpClient): array
    {
        $numberOfResults = 10;
        $token = 1247856435693245;
        $response = $httpClient->request('GET', 'https://superheroapi.com/api/1247856435693245/1/', [
            'headers' =>[
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'query' => [
                'format' => 'json',
               // 'inc' => 'name'
                'result' => $numberOfResults,
            ]
        ]);
        $data = $response->toArray();

        dd($data);
    }
}
