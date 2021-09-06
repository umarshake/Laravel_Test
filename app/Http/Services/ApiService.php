<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ApiService {

    private $client;

    public function __construct(){
        $this->client = new Client();
    }

    public function getDataFromApi($page=1){
        
        $response = $this->client->get('https://trial.craig.mtcserver15.com/api/properties', [
            'query' => [
                        'api_key' =>'3NLTTNlXsi6rBWl7nYGluOdkl2htFHug',
                        'page' => $page
                    ]
        ]);

        $body = $response->getBody();
        $contents = $body->getContents();

        $pageData = (json_decode($contents,1));
        return [
            'data' => $pageData['data'],
            'total_pages' => $pageData['last_page'],
        ];
    }
}