<?php

namespace App\Service;

class HttpClientService
{
    public function get(string $url, int $limit = 30)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request(
            'GET',
            $url . '?limit=' . $limit,
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }
}
