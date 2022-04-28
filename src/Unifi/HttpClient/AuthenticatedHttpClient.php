<?php

namespace Mtijn\Automation\Unifi\HttpClient;

use Mtijn\Automation\HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthenticatedHttpClient implements HttpClient
{
    public function __construct(
        private HttpClient $httpClient,
        private array $cookies
    ) {
    }

    public function request(string $method, string $url): RequestInterface
    {
        return $this->httpClient->request($method, $url);
    }

    public function executeRequest(RequestInterface $request): ResponseInterface
    {
        $request = $request->withAddedHeader('Cookie', $this->cookies[0]);
        return $this->httpClient->executeRequest($request);
    }
}
