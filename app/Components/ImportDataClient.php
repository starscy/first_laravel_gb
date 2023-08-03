<?php

namespace App\Components;


use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => "https://jsonplaceholder.typicode.com/todos/1",
            'timeout' => 2.0
        ]);
    }

}
