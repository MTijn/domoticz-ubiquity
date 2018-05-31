<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Automation\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Mtijn\Automation\HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleHttpClient implements HttpClient
{
    public function request(string $method, string $url): RequestInterface
    {
        return new Request($method, $url);
    }

    public function executeRequest(RequestInterface $request): ResponseInterface
    {
        $client = new Client(['verify' => false]);
        return $client->send($request);
    }
}
