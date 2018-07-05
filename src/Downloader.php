<?php

namespace App;

use GuzzleHttp\ClientInterface;
use Generator;
use GuzzleHttp\Psr7\Response;

class Downloader implements DownloaderInterface
{
    protected $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function download(array $urls): Generator
    {
        foreach ($urls as $url) {
            $response = $this->client->request('GET', $url);

            yield $url => $response;
        }
    }
}