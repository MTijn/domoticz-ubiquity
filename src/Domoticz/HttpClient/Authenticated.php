<?php
/**
 * @copyright 2018 Martijn Klene
 * @author Martijn Klene
 */

namespace Mtijn\Automation\Domoticz\HttpClient;

use Mtijn\Automation\HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Authenticated implements HttpClient
{
    /** @var HttpClient */
    private $httpClient;

    /**
     * Authenticated constructor.
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    public function request(string $method, string $url): RequestInterface
    {
        return $this->httpClient->request($method, $url);
    }

    public function executeRequest(RequestInterface $request): ResponseInterface
    {
        $request = $request->withAddedHeader('Authorization', sprintf(
            'Basic %s',
            base64_encode(sprintf(
                '%s:%s',
                getenv('domoticz.username'),
                getenv('domoticz.password')
            ))
        ));
        return $this->httpClient->executeRequest($request);
    }
}
