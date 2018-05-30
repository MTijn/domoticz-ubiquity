<?php
/**
 * @copyright 2018 Summa
 * @author Martijn Klene <martijn.klene@voiceworks.com>
 */

namespace Mtijn\Automation\Unifi\HttpClient;

use Mtijn\Automation\HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthenticatedHttpClient implements HttpClient
{
    /** @var HttpClient */
    private $httpClient;
    /** @var array */
    private $cookies;

    /**
     * AuthenticatedHttpClient constructor.
     * @param HttpClient $httpClient
     * @param array $cookies
     */
    public function __construct(HttpClient $httpClient, array $cookies)
    {
        $this->httpClient = $httpClient;
        $this->cookies = $cookies;
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
